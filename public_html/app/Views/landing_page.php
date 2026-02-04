<html lang="de">

<head>
    <meta charset="utf-8">
    <title>Liegeplatz Reservierungs Seite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
    <? require 'components/navbar.php'; ?>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Liegeplatz- und Bootsverleih </h1>
                    <p class="lead text-body-secondary">Buchen Sie ihren nächsten Bootsplatz oder sogar Boot bei uns und bereist die Gewässer, mit Familie oder Freunden.</p>
                    <p>
                        <button href="/" class="btn btn-primary my-2" disabled>Liegeplatz buchen</button>
                        <button href="/" class="btn btn-secondary my-2" disabled>Boot buchen</button>
                    </p>
                </div>
            </div>
        </section>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <?php for ($i = 0; $i < 9; $i++): ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top" height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%" xmlns="http://www.w3.org/2000/svg">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" style="--darkreader-inline-fill: var(--darkreader-background-55595c, #43484b);" data-darkreader-inline-fill=""></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em" style="--darkreader-inline-fill: var(--darkreader-text-eceeef, #dddad6);" data-darkreader-inline-fill="">Thumbnail</text>
                                </svg>
                                <div class="card-body">
                                    <p class="card-text">Hier werden unser Boot vorgestellt mit allen nötigen Inforamtionen, aber aktuell Platzhalter</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Details</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Buchen</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
    </main>
    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="mb-1">Dieser Service wird ihnen von uns bereitgestellt.</p>

        </div>
    </footer>

</body>

</html>