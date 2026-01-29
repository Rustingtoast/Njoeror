<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Verwaltung / Benutzer</title>
</head>

<body>
    <h1>User Creation, world!</h1>

    <form action="" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Benutzer</th>
                    <th></th>
                    <th></th>
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
                            <td><input type="submit" name="BUTTON_edit_<?= $index ?>" value="bearbeiten"></td>
                            <td><input type="submit" name="BUTTON_delete_<?= $index ?>" value="löschen"></td>
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