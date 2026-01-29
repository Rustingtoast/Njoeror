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
    <div>
        <span class="btn-group">
            <form action="/user/creation/back" method="post">
                <input type="submit" class="btn btn-outline-dark m-1" value=" > back">
            </form>
            <h1>User Creation, world!</h1>
        </span>


        <form action="" method="post" class="m-1">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Vorname</span>
                <input type="text" placeholder="Max" name="INPUT1_VORNAME" size=15 class="form-control"><br>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Nachname</span>
                <input type="text" placeholder="Mustermann" name="INPUT_NACHNAME" size=15 class="form-control"><br>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">E-Mail</span>
                <input type="text" placeholder="beispiel" name="INPUT_EMAIL" size=15 class="form-control"><br>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon4">Passwort</span>
                <input type="password" name="INPUT_PASSWORD" size=15 class="form-control"><br>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon5">Geburtstag</span>
                <input type="date" placeholder="Stuff" name="INPUTDATE_BIRTHDATE" size=15 class="form-control"><br>
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon6">Rolle</span>
                <input type="number" name="INPUT_ROLLE" size=15><br>
            </div>

            <input type="submit" value="Speichern">
        </form>
    </div>
    <div>
    </div>
</body>

</html>