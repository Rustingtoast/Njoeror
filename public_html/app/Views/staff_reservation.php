<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Verwaltung / Reservationen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <? require 'components/navbar.php'; ?>
    <div style="width: 1000px; margin: auto;">

        <h1>Staff Reservation</h1>

        <?php if (isset($error)) : echo $error;
        endif; ?>

        <?php if (isset($reservations) && empty($reservations)) : ?>
            <p>Keine Reservierungen gefunden.</p>
        <?php endif; ?>

        <?php if (isset($reservations)) : ?>
            <h2>Offene Reservierungen</h2>
            <?php foreach ($reservations as $reservation) : ?>

                <div class="card mb-3">
                    <div class="card-body flex flex-col gap-3">
                        <strong>Name:</strong>
                        <span><?php echo $reservation['Vorname']; ?> <?php echo $reservation['Nachname']; ?></span><br>
                        <strong>Datum:</strong>
                        <span> <?php echo $reservation['Start_Datum']; ?> - <?php echo $reservation['End_Datum']; ?></span> <br>
                        <strong>Kontakt:</strong>
                        <span><?php echo $reservation['E-Mail']; ?></span><br>
                        <strong>Liegeplatz:</strong>
                        <span><?php echo $reservation['Position']; ?></span><br>
                        <strong>Status:</strong>
                        <?php if ($reservation['Accepted'] !== null):  ?>
                            <span><?= esc($reservation['Accepted'] ? 'Akzeptiert' : 'Abgelehnt') ?></span><br>
                        <?php else: ?>
                            <span>Ausstehend</span><br>
                        <?php endif; ?>
                        <div class="d-flex gap-3">
                            <form action="/staff/reservation/list/accept" method="post">
                                <input type="submit" name="BUTTON_accept_<?php echo $reservation['ID']; ?>" value="Akzeptieren" class="btn btn-success" <?php echo $reservation['Accepted'] !== null ? 'disabled' : ''; ?>>
                            </form>
                            <form action="/staff/reservation/list/reject" method="post">
                                <input type="submit" name="BUTTON_reject_<?php echo $reservation['ID']; ?>" value="Ablehnen" class="btn btn-danger" <?php echo $reservation['Accepted'] !== null ? 'disabled' : ''; ?>>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</body>

</html>