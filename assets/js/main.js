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
            alert(response)
            let data = JSON.parse(response);
            if (data.status == 'error') {
                Swal.fire("Грешка!", data.message, 'error');
            } else if (data.status == 'success') {
                Swal.fire('', data.message, 'success').then(() => { location.href = 'index.php' });
            }
        })
    })






})

