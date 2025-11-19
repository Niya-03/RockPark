<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RockPark!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/custom.css">
</head>

<body class="bg-black">
    <nav class="navbar navbar-expand-lg bg-dark-subtle nav-outline-danger mb-5">
        <div class="container">
            <a class="navbar-brand fw-semibold fs-3" href="#">Rock Park!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Стаи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-danger">Резервирай стая</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex align-items-center justify-content-center formDiv">
        <div class="bg-dark-subtle opacity-100 border rounded-3 mb-5 px-4 pt-3 pb-4 formWidth">
            <div class="h1 text-center">Моите резервации</div>
            <div class="mb-2 mt-4 border border-2 p-2 rounded-2 border-black">
                <div class="container pt-2">
                    <div class="row">
                        <div class="col col-12">
                            <div class="h5">Стая: </div>
                            <div class="h5">Дата: </div>
                            <div class="h5">Час: </div>
                        </div>
                        <div class="col col-12 text-center mt-2">
                            <button id="deleteReservation" class="btn btn-danger">Отменете резервация</button>
                        </div>
                    </div>

                </div>


            </div>


        </div>
    </div>

    <footer class="bg-dark opacity-75 py-5">
        <div class="text-white text-center">
            &copy Niya Dimitrova - UE-Varna
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>