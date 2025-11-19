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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./assets/js/main.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        <div class="bg-dark-subtle opacity-100 border rounded-3 mt-0 mb-5 px-4 pt-3 pb-4 formWidth">
            <div class="h1 text-center">Регистрация</div>
            <form>
                <div class="mb-3">
                    <label for="regUser" class="form-label fw-semibold">Име</label>
                    <input type="text" class="form-control fieldWidth" id="regUser">
                </div>
                <div class="mb-3">
                    <label for="regEmail" class="form-label fw-semibold">Имейл</label>
                    <input type="email" class="form-control fieldWidth" id="regEmail">
                </div>
                <div class="mb-3">
                    <label for="regPhone" class="form-label fw-semibold">Телефонен номер</label>
                    <input type="text" class="form-control fieldWidth" id="regPhone">
                </div>
                <div class="mb-3">
                    <label for="regPass" class="form-label fw-semibold">Парола</label>
                    <input type="password" class="form-control fieldWidth" id="regPass">
                </div>
                <div class="mb-3">
                    <label for="regRep" class="form-label fw-semibold">Повторете паролата</label>
                    <input type="password" class="form-control fieldWidth" id="regRep">
                </div>

                <div class="g-recaptcha" data-sitekey="6Lf8rBEsAAAAABRghF7jMhaZ07Lxw7kOvG7TCEmM"></div>

                <div>
                    Вече имате профил? Влезте от <a href="login.php">тук</a>
                </div>
                <div class="text-center mt-4">
                    <button id="registerBtn" class="btn btn-danger">Регистрация</button>
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