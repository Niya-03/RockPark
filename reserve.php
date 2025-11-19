<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RockPark!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/custom.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
        <div class="bg-dark-subtle opacity-100 border rounded-3 my-0 px-4 pt-3 pb-4 formWidth">
            <div class="h1 text-center">Резервация</div>
            <form action="POST">
                <div class="mb-3">
                    <label for="roomSelect" class="form-label fw-semibold">Изберете стая</label>
                    <select class="form-select" aria-label="Default select example" id="roomSelect">
                        <option value="1">Lux</option>
                        <option value="2">EZ</option>
                        <option value="3">All In One</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="reserveDate" class="form-label fw-semibold">Изберете дата</label>
                    <input type="date" id="reserveDate" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">Изберете час или часове</label>
                    <div class="container">
                        <div class="row gap-2 mb-2">
                            <button class="btn btn-danger btnHour" data-hour="10">10:00</button>
                            <button class="btn btn-danger btnHour" data-hour="11">11:00</button>
                            <button class="btn btn-danger btnHour" data-hour="12">12:00</button>
                            <button class="btn btn-danger btnHour" data-hour="13">13:00</button>
                            <button class="btn btn-danger btnHour" data-hour="14">14:00</button>
                        </div>
                         <div class="row gap-2 mb-2">
                            <button class="btn btn-danger btnHour" data-hour="15">15:00</button>
                            <button class="btn btn-danger btnHour" data-hour="16">16:00</button>
                            <button class="btn btn-danger btnHour" data-hour="17">17:00</button>
                            <button class="btn btn-danger btnHour" data-hour="18">18:00</button>
                            <button class="btn btn-danger btnHour" data-hour="19">19:00</button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" id="registerBtn" class="btn btn-danger">Резервирайте</button>
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

    <script>
        document.querySelectorAll('.btnHour').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault()
                if(e.target.classList.contains('btnSelected'))
                {
                    e.target.classList.remove('btnSelected')
                }else{
                    e.target.classList.add('btnSelected')
                }
                
            })
        });

    </script>
</body>

</html>