<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Reservierungsübersicht</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <?= view('components/navbar') ?>
    <h1>Meine Liegeplatz-Reservierungen</h1> <?php if (!empty($reservations) && is_array($reservations)): ?>
        <table border="1" cellpadding="6" cellspacing="0" class="table">
            <thead>
                <tr>
                    <th>Von</th>
                    <th>Bis</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $r): ?>
                    <tr>
                        <td><?= esc($r['Start_Datum']) ?></td>
                        <td><?= esc($r['End_Datum']) ?></td>
                        <td><?= esc($r['Position']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> <?php else: ?>
        <p>Keine Reservierungen gefunden.</p> <?php endif; ?>
</body>

</html>