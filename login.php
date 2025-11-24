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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                            <a class="nav-link" id='myReservationsBtn' href="myReservations.php">Моите резервации</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link editProfile" href="editProfile.php">Моят профил</a>
                        </li>
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
    <div class="d-flex align-items-center justify-content-center formDiv">
        <div class="bg-dark-subtle opacity-100 border rounded-3 my-0 px-4 pt-3 pb-4 formWidth mb-5">
            <div class="h1 text-center">Вход</div>
            <form action="POST">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label fw-semibold">Имейл</label>
                    <input type="email" class="form-control fieldWidth" id="loginEmail" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="loginPass" class="form-label fw-semibold">Парола</label>
                    <input type="password" class="form-control fieldWidth" id="loginPass">
                </div>
                <div>
                    Нямате профил? Регистрирайте се <a href="register.php">тук</a>
                </div>
                <div class="text-center mt-4">
                    <button id="loginBtn" class="btn btn-danger">Вход</button>
                </div>
        </div>
        </form>
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