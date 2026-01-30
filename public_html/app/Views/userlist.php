<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Verwaltung / Benutzer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <h1>User Creation, world!</h1>
    <form action="/user/list/new" method="post">
        <input type="submit" name="BUTTON_CreateUser" value="Neuen Benutzer erstellen" />
    </form>

    <form action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Benutzer</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($names)) : ?>
                    <?php $index = 0; ?>
                    <?php foreach ($names as $name) : ?>
                        <?php $index++; ?>
                        <tr>
                            <th scope="row"><?= $index ?></th>
                            <td><?= esc($name) ?></td>
                            <td>
                                <input type="submit" name="BUTTON_edit_<?= $index ?>" value="bearbeiten" disabled>
                                <input type="submit" name="BUTTON_delete_<?= $index ?>" value="löschen" disabled>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Keine User gefunden!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </form>
</body>

</html>