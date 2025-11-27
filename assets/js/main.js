$(document).ready(function () {
    loadReservations();

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
                console.log(response)
                let data = JSON.parse(response);
                if (data.status == 'error') {
                    Swal.fire("Грешка", data.message, "error");
                    refreshBtns();
                }
                else if (data.status == 'success') {
                    Swal.fire("", data.message, "success").then(() => {
                        refreshBtns();
                        location.href = "myReservations.php"
                    });
                }
            })

    })

    $('#roomSelect').on('change', function () {
        resetBtns();
    })

    $('#reserveDate').on('input', function (e) {
        resetBtns();
        refreshBtns();
    })

    function refreshBtns() {
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
    }



    $(document).on('click', '.deleteReservationBtn', function (e) {


        Swal.fire({
            title: "Сигурни ли сте, че искате да изтриете резервацията?",
            showDenyButton: true,
            confirmButtonText: "Да",
            denyButtonText: "Не"
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('./api/delete_reservation.php', {
                    deleteId: e.target.dataset.id
                },
                    function (response) {
                        let data = JSON.parse(response);
                        if (data.status == 'error') {
                            Swal.fire("Грешка", data.message, "error");
                        }
                        else if (data.status == 'success') {
                            Swal.fire("", data.message, "success").then(() => {
                                loadReservations();
                            });
                        }
                    })
            }
        });
    }
    )

    $('#editUserBtn').on('click', function (e) {
        e.preventDefault();
        $.post('./api/edit_profile.php', {
            editName: $('#editName').val(),
            editEmail: $('#editEmail').val(),
            editPhone: $('#editPhone').val(),
            currentPass: $('#currentPass').val(),
            newPass: $('#newPass').val(),
            reNewPass: $('#reNewPass').val()
        }, function (response) {
            let data = JSON.parse(response);

            if (data.status == 'error') {
                Swal.fire("Грешка", data.message, "error");
            }
            else if (data.status == 'success') {
                Swal.fire("", data.message, "success");
                $('#currentPass').val('');
                $('#newPass').val('');
                $('#reNewPass').val('');
                loadUserData();
            }
        })
    })

    loadUserData();
})


function loadReservations() {
    $('#reservationsContainer').empty().load('./api/my_reservations.php');
}

function loadUserData() {
    $.post('./api/get_user_data.php', {}, function (response) {
        let data = JSON.parse(response);
        if (data.status == 'success') {
            $('#editName').val(data.user.name);
            $('#editEmail').val(data.user.email);
            $('#editPhone').val(data.user.phone);
        } else if (data.status == 'error') {
            Swal.fire("Грешка", data.message, "error");
        }
    })
}

function resetBtns() {
    document.querySelectorAll('.btnHour').forEach(btn => {
        btn.disabled = false;
    })
}

