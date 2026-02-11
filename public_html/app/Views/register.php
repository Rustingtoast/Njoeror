<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrierung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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
            background: url("<?php echo base_url('Images/1.webp'); ?>") no-repeat center / cover;
            min-height: 100vh;
            display: block;
            padding: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;

            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 128, 255, 0.3);
            pointer-events: none;
        }

        .page-content {
            min-height: calc(100vh - 56px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;

            position: relative;
            z-index: 1;
        }

        .auth-card {
            width: 100%;
            max-width: 720px;
            border: 0;
            border-radius: 0;
            box-shadow: var(--shadow);
            overflow: hidden;

            position: relative;
            z-index: 1;
        }

        .auth-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            background: var(--panel);
            backdrop-filter: blur(6px);
        }

        .auth-header .d-flex.flex-column {
            min-width: 0;
        }

        @media (max-width: 576px) {
            .auth-header {
                flex-wrap: wrap;
            }

            .auth-header .ms-auto {
                margin-left: 0 !important;
                width: 100%;
            }

            .auth-header .ms-auto form {
                display: flex;
                justify-content: flex-end;
            }
        }

        .logo-placeholder {
            width: 56px;
            height: 56px;
            background: linear-gradient(180deg, #e9eefb, #ffffff);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #3b4b7a;
            box-shadow: inset 0 -2px 6px rgba(59, 75, 122, 0.03);
        }

        .auth-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 600;
            color: #26334a;
        }

        .card-body {
            padding: 1.5rem;
            background: #fff;
        }

        .form-actions {
            padding: 1rem 1.5rem;
            background: #fafbff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .small-note {
            font-size: .9rem;
            color: #6b7280;
        }

        #ldap-logo-large {
            max-width: 100%;
        }

        .input-group-text {
            min-width: 125px;
            justify-content: flex-start;
            font-weight: 500;
            background: #f3f4f6;
            color: #111827;
        }

        @media (max-width: 576px) {
            .input-group-text {
                min-width: 110px;
                font-size: 0.9rem;
            }
        }

        #back-button {
            border: 0;
            border-radius: 0;
            padding: 0.5rem 2rem;
            background: var(--brandred);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        #back-button:hover {
            background: var(--brandred-hover);
            cursor: pointer;
        }

        #save-button {
            border: 0;
            border-radius: 0;
            padding: 0.5rem 2rem;
            background: var(--brand);
            color: #fff;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        #save-button:hover {
            background: var(--brand-hover);
            cursor: pointer;
        }

        .footer-link {
            text-decoration: none;
            color: #000;
            transition: color 0.2s ease-in-out;
        }

        .footer-link:hover {
            color: var(--brand);
        }
    </style>
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">


        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    <?php if (isset($status)): ?>
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:" style="width: 24px; height: 24px;">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <strong>Fehler ist aufgetreten!</strong>&nbsp; <?= esc($status); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="page-content">
        <div class="card auth-card">
            <div class="auth-header">
                <div class="logo-placeholder"><img src="/Images/LDAP_Bros.png" id="ldap-logo-large" alt=""></div>
                <div class="d-flex flex-column">
                    <h1 class="auth-title">Registrierung</h1>
                    <small class="small-note">Kunden-Account anlegen</small>
                </div>
            </div>

            <div class="card-body">
                <form action="" method="post" class="row g-3">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Vorname</span>
                            <input type="text" name="INPUT_VORNAME" size="15" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2">Nachname</span>
                            <input type="text" name="INPUT_NACHNAME" size="15" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">E-Mail</span>
                            <input type="text" name="INPUT_EMAIL" size="15" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon4">Passwort</span>
                            <input type="password" name="INPUT_PASSWORD" size="15" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon5">Passwort bestätigen</span>
                            <input type="password" name="INPUT_PASSWORD_CONFIRM" size="15" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 ">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon6">Geburtstag</span>
                            <input type="date" name="INPUT_BIRTHDATE" size="15" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 ">
                        <div class="input-group">
                            <span class="input-group-text">Land</span>
                            <input type="text" name="INPUT_COUNTRY" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="input-group">
                            <span class="input-group-text">Adresse</span>
                            <input type="text" name="INPUT_ADDRESS" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Hausnr.</span>
                            <input type="text" name="INPUT_HOUSENUMBER" class="form-control" required>
                        </div>
                    </div>

                    <input type="hidden" name="INPUT_ROLLE" value="3" class="form-control">


                    <div class="col-12 d-flex justify-content-end">
                        <input type="submit" id="save-button" class="btn btn-outline-dark" value="Speichern" data-bs-toggle="modal" data-bs-target="#infobox">
                    </div>
                </form>
            </div>

            <div class="form-actions">
                <div class="small-note">Bereits ein Account? · <a href="/login" class="footer-link">Zum Login</a></div>
                <div class="small-note">Plau am See © LDAP-Bros</div>
            </div>


        </div>
    </div>

</body>

</html>