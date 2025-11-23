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
    <div class="container mb-4">
        <div class="row py-5 text-white textShadow mx-0 bg-black justify-content-center">
            <div class="rockBg">
                <div class="h1 text-center mb-5 mt-3">
                    Искаш ли да си рок звезда?
                </div>
                <div class="h3 text-center pt-4">
                    RockPark! предлага 3 оборудвани репетиционни, в които можеш да развиеш музикалния си потенциал!
                </div>
                <div class="container justify-content-center">
                    <div class="row mt-5">
                        <div class="col col-6 text-end">
                            <?php if (isset($_SESSION['user_email'])) : ?>
                            <a href="reserve.php" class="btn btn-danger reserveBtn">Резервирай стая</a>
                        <?php else : ?>
                            <a href="login.php" class="btn btn-danger reserveBtn">Резервирай стая</a>
                        <?php endif; ?>
                            

                        </div>
                        <div class="col col-6 text-start">
                            <a href="rooms.php" class="btn text-white border border-2 border-danger btnWidth btnSecondaryHover">
                                Виж стаите
                            </a>
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