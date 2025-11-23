$(document).ready(function () {
    $('#registerBtn').on('click', function (e) {
        e.preventDefault();
        $.post('./api/register.php', {
            username: $('#regUser').val(),
            email: $('#regEmail').val(),
            phone: $('#regPhone').val(),
            password: $('#regPass').val(),
            repPassword: $('#regRep').val(),
            recaptcha: grecaptcha.getResponse()
        }, function (response) {
            let data = JSON.parse(response);
            if (data.status == 'error') {
                Swal.fire("Грешка!", data.message, 'error');
            } else if (data.status == 'success') {
                Swal.fire('', data.message, 'success').then(() => {
                    if (sessionStorage.getItem('redirectToReserve') == 'true') {
                        location.href = "reserve.php"
                    }
                    else {
                        location.href = "index.php"
                    }
                    sessionStorage.clear();
                });

            }
        })
    })

    $('#loginBtn').on('click', function (e) {
        e.preventDefault();
        $.post('./api/login.php', {
            email: $('#loginEmail').val(),
            password: $('#loginPass').val()
        },
            function (response) {
                let data = JSON.parse(response);
                if (data.status == 'error') {
                    Swal.fire("Грешка", data.message, "error");
                }
                else if (data.status == 'success') {
                    Swal.fire("", data.message, "success").then(() => {
                        if (sessionStorage.getItem('redirectToReserve') == 'true') {
                            location.href = "reserve.php"
                        }
                        else {
                            location.href = "index.php"
                        }
                        sessionStorage.clear();

                    });
                }
            })
    })

    $('#logoutBtn').on('click', function () {

        $.post('./api/logout.php',
            function (response) {
                let data = JSON.parse(response);
                if (data.status == 'success') {
                    location.href = 'index.php';
                }
            }
        )
    })

    $('.reserveBtn').on('click', function (e) {
        e.preventDefault();

        if (e.target.href.substr(-9) == 'login.php') {
            sessionStorage.setItem('redirectToReserve', true);
            location.href = 'login.php';
        } else {
            sessionStorage.setItem('redirectToReserve', false);
            location.href = 'reserve.php';
        }

    })






})

