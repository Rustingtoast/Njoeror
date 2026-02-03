<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrierung</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous" />

    <style>
        :root {
            --brand: #2060ee;
            --brand-hover: #3070ff;
            --brandred: #d80202;
            --brandred-hover: #e22a2a;
            --panel: rgba(255, 255, 255, 0.65);
            --shadow: 4px 4px 10px rgba(0, 0, 0, 0.35);
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            padding: 5vh 1rem 10vh;
            background: url("Bilder/1.webp") no-repeat center / cover;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 128, 255, 0.3);
            pointer-events: none;
        }

        .login-card {
            position: relative;
            /* über dem Overlay */
            width: min(420px, 100%);
            background: var(--panel);
            backdrop-filter: blur(2px);
            box-shadow: var(--shadow);
            text-align: center;
            padding-bottom: 1rem;
        }

        header h1,
        header h2 {
            margin: 0;
        }

        label {
            margin: 0;
            cursor: pointer;
            user-select: none;
        }

        header h1 {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1;
            padding: 1rem;
            background: #fff;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
        }

        header h2 {
            margin: 0 0 1.75rem;
            padding: 0.25rem 0.5rem;
            background: rgba(255, 255, 255, 0.6);
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .input-div {
            padding-bottom: 1rem;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            border: 0;
            background: #fff;
            color: #000;
            padding: 0.5rem;
            width: min(280px, 90%);
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="text"]:focus,
        input[type="checkbox"]:focus-visible,
        a:focus-visible,
        button:focus-visible {
            outline: 3px solid rgba(32, 96, 238, 0.35);
            outline-offset: 2px;
        }

        input[type="checkbox"] {
            cursor: pointer;
        }

        .btn-primaryish {
            border: 0;
            display: inline-block;
            padding: 0.5rem 2rem;
            margin-bottom: 1rem;
            background: var(--brand);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primaryish:hover {
            background: var(--brand-hover);
            cursor: pointer;
        }

        .btn-homepage {
            border: 0;
            display: inline-block;
            padding: 0.5rem 2rem;
            margin-bottom: 1rem;
            background: var(--brandred);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-homepage:hover {
            background: var(--brandred-hover);
            cursor: pointer;
        }

        form {
            padding: 0 0 1.25rem;
        }

        .footer-link {
            text-decoration: none;
            color: #000;
            transition: color 0.2s ease-in-out;
        }

        .footer-link:hover {
            color: var(--brand);
        }

        footer small {
            display: inline-block;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <header>
            <h1>LOGO<br />IMAGE</h1>
            <h2>Registrierung</h2>
        </header>

        <main>
            <div>
                <?php if (isset($status)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= esc($status) ?>
                    </div>
                <?php endif; ?>
            </div>
            <form action="" method="post" autocomplete="on">
                <div class="input-div">
                    <label for="vorname">Vorname</label><br />
                    <input
                        id="vorname"
                        name="INPUT_vorname"
                        type="text"
                        placeholder="Vorname"
                        autocomplete="given-name"
                        required />
                </div>
                <div class="input-div">
                    <label for="nachname">Nachname</label><br />
                    <input
                        id="nachname"
                        name="INPUT_nachname"
                        type="text"
                        placeholder="Nachname"
                        autocomplete="family-name"
                        required />
                </div>
                <div class="input-div">
                    <label for="email">E-Mail</label><br />
                    <input
                        id="email"
                        name="INPUT_email"
                        type="email"
                        placeholder="E-Mail"
                        inputmode="email"
                        autocomplete="username"
                        required />
                </div>

                <div class="input-div">
                    <label for="password">Passwort</label><br />
                    <input
                        id="password"
                        name="INPUT_password"
                        type="password"
                        placeholder="Passwort"
                        autocomplete="current-password"
                        required />
                    <br>
                    <label for="password">Passwort wiederholen</label><br />
                    <input
                        id="password2"
                        name="INPUT_password2"
                        type="password"
                        placeholder="Passwort wiederholen"
                        autocomplete="current-password"
                        required />
                </div>
                <div class="input-div">
                    <label for="birthdate">Geburtsdatum</label><br />
                    <input
                        id="birthdate"
                        name="INPUT_birthdate"
                        type="date"
                        placeholder="Geburtsdatum"
                        autocomplete="bday" />
                </div>
                <input
                    id="Rolle"
                    name="INPUT_rolle"
                    type="hidden"
                    value="3" />

                <div class="input-div">
                    <label>
                        <input type="checkbox" onclick="hidePassword()">
                        Passwörter anzeigen
                    </label>
                </div>

                <button id="inputbutton" class="btn-primaryish" type="submit">Account erstellen</button>

                <nav aria-label="Login Hilfe">
                    Bereits einen Account?
                    <span aria-hidden="true"> · </span>
                    <a href="/login" class="footer-link">Zum Login</a>
                </nav>
            </form>
        </main>

        <footer>
            <small>&copy; <span id="year"></span> LDAP-Bros</small>
        </footer>
    </div>

    <script>
        function hidePassword() {
            const p1 = document.getElementById("password");
            const p2 = document.getElementById("password2");
            const newType = p1.type === "password" ? "text" : "password";
            p1.type = newType;
            p2.type = newType;
        }
    </script>
</body>

</html>