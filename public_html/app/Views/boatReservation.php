<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Boot Reservierung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gridstackjs.com/demo/demo.css">

    <script src="https://cdn.jsdelivr.net/npm/gridstack@latest/dist/gridstack-all.js"></script>
  </head>
  <body>
    <main id="app">
        <button type="button" @click="addNewWidget()">Add Widget</button> {{ info }}
        <div class="grid-stack" id="grid1"></div>
        <h1>Test</h1>
        <div class="grid-stack gs-6 ui-droppable ui-droppable-over grid-stack-animate" id="gridTop" style="--gs-item-margin-top: 10px; --gs-item-margin-bottom: 10px; --gs-item-margin-right: 10px; --gs-item-margin-left: 10px; --gs-column-width: 16.666666666666668%; --gs-cell-height: 70px; height: 560px;" gs-current-row="8"></div>
        </div>
    </main>

    <script type="module">
      import { createApp, ref, onMounted, onBeforeUnmount, h, render, toRefs } from "https://cdn.jsdelivr.net/npm/vue@3.0.11/dist/vue.esm-browser.js";

      const GridContentComponent = {
        props: {
          itemId: {
            type: [String, Number],
            required: true,
          },
        },
        emits: ['remove'],
        setup(props, { emit }) {
          const { itemId } = toRefs(props)

          onBeforeUnmount(() => {
            console.log(`In vue onBeforeUnmount for item ${itemId.value}`)
          });

          function handleRemove() {
            emit('remove', itemId.value)
          }

          return {
            itemId,
            handleRemove,
          }
        },
        template: `
          <div class="my-custom-grid-item-content">
            <button @click=handleRemove>X</button>
            <p>
              Vue Grid Item Content {{ itemId }}
            </p>
          </div>
        `
      }

      createApp({
        setup() {
          let info = ref("");
          let grid = null; // DO NOT use ref(null) as proxies GS will break all logic when comparing structures... see https://github.com/gridstack/gridstack.js/issues/2115
          const items = [
            { id: 1, x: 0, y: 0, w: 2, h: 4 },
          ];
          let count = ref(items.length);

          let gridTop = null;

          

          onMounted(() => {
            grid = GridStack.init({ // DO NOT user grid.value = GridStack.init(), see above
              float: true,
              cellHeight: "70px",
              minRow: 1,
            },'grid1');

            gridTop = GridStack.init(
                {
                    float: true,
                    cellHeight: "40px",
                    minRow: 5,
                }
            );

            grid.on('added', function(event, items) {
              for (const item of items) {
                const itemEl = item.el
                const itemElContent = itemEl.querySelector('.grid-stack-item-content')

                const itemId = item.id

                // Use Vue's render function to create the content
                // See https://vuejs.org/guide/extras/render-function.html#render-functions-jsx
                //      Supports: emit, slots, props, attrs, see onRemove event below
                const itemContentVNode = h(
                  GridContentComponent,
                  {
                    itemId: itemId,
                    onRemove: (itemId) => {
                      grid.removeWidget(itemEl)
                    }
                  }
                )

                // Render the vue node into the item element
                render(itemContentVNode, itemElContent)
              }
            });

            grid.on('removed', function(event, items) {
              for (const item of items) {
                const itemEl = item.el
                const itemElContent = itemEl.querySelector('.grid-stack-item-content')
                // Unmount the vue node from the item element
                // Calling render with null will allow vue to clean up the DOM, and trigger lifecycle hooks
                render(null, itemElContent)
              }
            });

            grid.load(items);
          });

          function addNewWidget() {
            const node = items[count.value] || {
              x: 0, y: 0, w: 1, h: 2,
            };
            node.id = String(count.value++);
            grid.addWidget(node);
          }

          return {
            info,
            addNewWidget,
          };
        },

        watch: {
          /**
           * Clear the info text after a two second timeout. Clears previous timeout first.
           */
          info: function (newVal) {
            if (newVal.length === 0) return;

            window.clearTimeout(this.timerId);
            this.timerId = window.setTimeout(() => {
              this.info = "";
            }, 2000);
          },
        },
      }).mount("#app");
    </script>
  </body>
</html>
