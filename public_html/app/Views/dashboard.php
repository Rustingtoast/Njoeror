<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>CI4 + Vue + GridStack</title>

  <!-- GridStack CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/gridstack@9.2.0/dist/gridstack.min.css"
    rel="stylesheet"
  />

  <style>
    body { margin: 0; font-family: sans-serif; }
    .grid-stack { background: #f3f3f3; min-height: 400px; }
    .grid-stack-item-content {
      background: #3b82f6;
      color: white;
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>
</head>
<body>

  <div id="app"></div>

  <!-- Vue 3 -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>

  <!-- GridStack -->
  <script src="https://cdn.jsdelivr.net/npm/gridstack@9.2.0/dist/gridstack-all.js"></script>

  <!-- App -->
  <script>
    const { createApp, ref, onMounted } = Vue;

        createApp({
        setup() {
            const gridA = ref(null);
            const gridB = ref(null);

            const options = {
            column: 6,
            cellHeight: 80,
            margin: 5,
            float: true,
            acceptWidgets: true
            };

            onMounted(() => {
            gridA.value = GridStack.init(options, '#gridA');
            gridB.value = GridStack.init(options, '#gridB');

            gridA.value.addWidget({ w: 2, h: 1, content: 'Widget A1' });
            gridA.value.addWidget({ w: 2, h: 1, content: 'Widget A2' });
            gridB.value.addWidget({ w: 3, h: 1, content: 'Widget B1' });

            gridA.value.on('change', saveLayout);
            gridB.value.on('change', saveLayout);
            });

            function saveLayout() {
            fetch('/dashboard/saveLayout', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                gridA: gridA.value.save(),
                gridB: gridB.value.save()
                })
            });
            }

            return {};
        },

        template: `
            <div style="padding:20px; display:flex; gap:20px">
            <div style="width:50%">
                <h3>Grid A</h3>
                <div id="gridA" class="grid-stack"></div>
            </div>

            <div style="width:50%">
                <h3>Grid B</h3>
                <div id="gridB" class="grid-stack"></div>
            </div>
            </div>
        `
        }).mount('#app');

  </script>
</body>
</html>
