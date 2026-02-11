<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Benutzerverwaltung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>
        :root {
            --brand: #2060ee;
            --brand-hover: #3070ff;
            --brandred: #d80202;
            --brandred-hover: #e22a2a;
            --brandgray: #525252;
            --brandgray-hover: #696868;
            --panel: rgba(255, 255, 255, 0.65);
            --shadow: 4px 4px 10px rgba(0, 0, 0, 0.35);
        }

        .btn-primaryish {
            border: 0;
            border-radius: 7px;
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-bottom: 1rem;
            background: var(--brand);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primaryish-2 {
            border: 0;
            border-radius: 7px;
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--brandgray);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primaryred-2 {
            border: 0;
            border-radius: 7px;
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--brandred);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primaryish:hover {
            background: var(--brand-hover);
            cursor: pointer;
        }

        .btn-primaryish-2:hover {
            background: var(--brandgray-hover);
            cursor: pointer;
        }

        .btn-primaryred-2:hover {
            background: var(--brandred-hover);
            cursor: pointer;
        }

        #main-div {
            width: 90%;
            margin: auto;
        }
    </style>
</head>

<body>
    <? require 'components/navbar.php'; ?>
    <div id="main-div">
        <h1>Benutzerverwaltung</h1>
        <form action="/user/list/new" method="post">
            <input class="btn-primaryish" type="submit" name="BUTTON_CreateUser" value="Neuen Benutzer erstellen" />
        </form>

        <form action="" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Benutzer</th>
                        <th>Operationen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($userlist)) : ?>
                        <?php $index = 0; ?>
                        <?php foreach ($userlist as $user) : ?>
                            <tr>
                                <th scope="row"><?= esc($user->getID()) ?></th>
                                <td><?= esc($user->getFullName()) ?></td>
                                <td>
                                    <input class="btn-primaryish-2" type="submit" name="BUTTON_edit_<?= esc($user->getID()) ?>" value="Bearbeiten">
                                    <input class="btn-primaryred-2" type="submit" name="BUTTON_delete_<?= esc($user->getID()) ?>" value="Löschen" disabled>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">Keine Benutzer gefunden!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>