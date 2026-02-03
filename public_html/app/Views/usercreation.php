<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Benutzer Erstellung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <? require 'components/navbar.php'; ?>

    <div>
        <span class="btn-group">
            <form action="/user/creation/back" method="post">
                <input type="submit" class="btn btn-outline-dark m-1" value=" > back">
            </form>
            <h1>User Creation</h1>
        </span>


        <form action="" method="post" class="m-1">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Vorname</span>
                <input type="text" placeholder="Max" name="INPUT_VORNAME" size=15 class="form-control" required><br>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nachname</span>
                <input type="text" placeholder="Mustermann" name="INPUT_NACHNAME" size=15 class="form-control" required><br>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">E-Mail</span>
                <input type="email" placeholder="beispiel" name="INPUT_EMAIL" size=15 class="form-control" required><br>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon4">Passwort</span>
                <input type="password" name="INPUT_PASSWORD" size=15 class="form-control" required><br>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon5">Geburtstag</span>
                <input type="date" placeholder="Stuff" name="INPUTDATE_BIRTHDATE" size=15 class="form-control"><br>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Benutzer-Berechtigung</label>
                <select class="form-select" id="inputGroupSelect01" name="SELECT_Rolle" required>
                    <option selected disabled>--Nichts ausgewählt--</option>
                    <option value="1">Admin</option>
                    <option value="2">Mitarbeiter</option>
                    <option value="3">Kunde</option>
                </select>
            </div>

            <input type="submit" class="btn btn-outline-dark m-1" value="Speichern">
        </form>
        <?php if (isset($output)) : ?>
    </div> Status: "
    <?= esc($output) ?>
    "<div>
    <?php endif; ?>

    </div>
</body>

</html>