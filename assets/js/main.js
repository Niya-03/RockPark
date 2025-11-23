$(document).ready(function () {
    let today = new Date();
    let year = today.getFullYear();
    let month = String(today.getMonth() + 1).padStart(2, '0');
    let day = String(today.getDate()).padStart(2, '0');
    let minDate = `${year}-${month}-${day}`;
    $('#reserveDate').prop('min', minDate);

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


    $('#reserveBtn').on('click', function (e) {
        e.preventDefault();
        let selectedTimes = [];

        document.querySelectorAll('.btnSelected').forEach(btn => {
            selectedTimes.push(btn.dataset.hour);
        });

        $.post('./api/reserve.php', {
            room: $('#roomSelect').val(),
            date: $('#reserveDate').val(),
            hours: selectedTimes
        },
            function (response) {
                let data = JSON.parse(response);
                if (data.status == 'error') {
                    Swal.fire("Грешка", data.message, "error");
                }
                else if (data.status == 'success') {
                    Swal.fire("", data.message, "success").then(() => {
                        location.href = "index.php"
                    });
                }
            })

    })

    $('#roomSelect').on('change', function () {
        resetBtns();
    })

    $('#reserveDate').on('input', function (e) {
        resetBtns();

        $.post('./api/get_reservation_hours.php', {
            room: $('#roomSelect').val(),
            date: $('#reserveDate').val()
        },
            function (response) {
                let data = JSON.parse(response);

                for (const hour of data.hours) {
                    document.querySelectorAll('.btnHour').forEach(btn => {
                        if (btn.dataset.hour == hour) {
                            btn.disabled = true;
                        }
                    })
                }
            })
    })

})

function resetBtns() {
    document.querySelectorAll('.btnHour').forEach(btn => {
        btn.disabled = false;
    })
}

