<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/gridstack@9.2.0/dist/gridstack.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
    }

    .grid-stack {
      background: #f3f3f3;
      min-height: 400px;
      width: 100%
    }

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
  <? require 'components/navbar.php'; ?>
  <div id="app">
    <div style="padding:20px; display:flex; gap:20px">
      <div style="flex:70; display:flex; flex-direction:column; gap:20px;">
        <div>
          <h3>Grid A</h3>
          <div id="gridA" class="grid-stack"></div>
        </div>
        <div>
          <h3>Grid B</h3>
          <div id="gridB" class="grid-stack"></div>
        </div>
      </div>
      <div>
        <h3>Open Ocean</h3>
        <div id="openOcean" class="grid-stack"></div>
      </div>
    </div>
  </div>
  <!-- Vue 3 -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
  <!-- GridStack -->
  <script src="https://cdn.jsdelivr.net/npm/gridstack@9.2.0/dist/gridstack-all.js"></script>
  <!-- App -->
  <script>
    const {
      createApp,
      ref,
      onMounted
    } = Vue;
    createApp({
      setup() {
        const gridA = ref(null);
        const gridB = ref(null);
        const openOcean = ref(null);
        let widget = {
          noResize: true,
          w: 1,
          h: 1,
          locked: true,
          conten: "Standard Widget"
        }
        const newOpt = {
          row: 4,
          dragout: true,
          acceptWidgets: true,
          float: true
        }
        const optGridOpenOcean = {
          column: 6,
          row: 6,
          cellHeight: 100,
          margin: 5,
          float: false,
          acceptWidgets: true
        }

        onMounted(() => {
          gridA.value = GridStack.init(newOpt, '#gridA');
          gridB.value = GridStack.init(newOpt, '#gridB');
          openOcean.value = GridStack.init(optGridOpenOcean, '#openOcean');
          gridA.value.addWidget({
            w: 1,
            h: 1,
            content: 'Boot'
          });
          gridA.value.addWidget({
            w: 1,
            h: 1,
            content: 'Widget B1'
          });
          openOcean.value.addWidget({
            w: 1,
            h: 1,
            content: "Test"
          });
          gridA.value.on('change', saveLayout);
          gridB.value.on('change', saveLayout);
          openOcean.value.on('change', saveLayout);
        });

        function saveLayout() {
          fetch('/dashboard/saveLayout', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              gridA: gridA.value.save(),
              gridB: gridB.value.save(),
              openOcean: openOcean.value.save()
            })
          });
        }

        return {};
      },
    }).mount('#app');
  </script>
</body>

</html>