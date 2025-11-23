<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RockPark!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/custom.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/main.js"></script>
</head>

<body class="bg-black">

    <nav class="navbar navbar-expand-lg bg-dark-subtle nav-outline-danger">
        <div class="container">
            <a class="navbar-brand fw-semibold fs-3" href="index.php">Rock Park!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav text-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="rooms.php">Стаи</a>
                    </li>
                    <?php if (!isset($_SESSION['user_email'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Вход</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Регистрация</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="logoutBtn">Изход</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <?php if (isset($_SESSION['user_email'])) : ?>
                            <a href="reserve.php" class="btn btn-danger reserveBtn">Резервирай стая</a>
                        <?php else : ?>
                            <a href="login.php" class="btn btn-danger reserveBtn">Резервирай стая</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row mt-4">
            <div class="col col-lg-5 col-12">
                <img src="./assets/imgs/room1.jpg" class="img-fluid">
            </div>
            <div class="col col-lg-7 col-12 text-start text-white mt-lg-3 d-flex flex-column justify-content-center fs-5">
                <p class="mt-2">Стая <b>Lux</b> - походяща за класически рок, оборудвана с 4 усилвателя, комплект барабани, пиано, синтезатор, бас и една електрическа китара Les Paul</p>
                <p class="fw-semibold">Цена: 30лв/час</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-lg-5 col-12">
                <img src="./assets/imgs/room2.jpg" class="img-fluid">
            </div>
            <div class="col col-lg-7 col-12 text-start text-white mt-lg-3 d-flex flex-column justify-content-center fs-5">
                <p class="mt-2">Стая <b>EZ</b> - оборудвана с 3 микрофона, комплект барабани и синтезатор.</p>
                <p class="fw-semibold">Цена: 25лв/час</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col col-lg-5 col-12">
                <img src="./assets/imgs/room3.jpg" class="img-fluid">
            </div>
            <div class="col col-lg-7 col-12 text-start text-white mt-lg-3 d-flex flex-column justify-content-center fs-5">
                <p class="mt-2">Стая <b>All In One</b> - оборудвана с 3 усилвателя, комплект барабани, микрофон, бас и електрическа китара. Подходяща за всякакъв тип групи.</p>
                <p class="fw-semibold">Цена: 20лв/час</p>
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