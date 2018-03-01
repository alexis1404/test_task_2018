$(document).ready(function () {

    $('#reg_submit').prop('disabled', true);

    let pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

    function checker() {
        if($('#inputName').val() !== '' &&
            $('#inputLastName').val() !== '' &&
            $('#inputPassword').val() !== '' &&
            pattern.test($('#inputEmail').val())){

            $('#reg_submit').prop('disabled', false);
            $('#warningMessage').hide();
        }else {
            $('#reg_submit').prop('disabled', true);
        }
    }

    $('#inputName').keyup(function () {
        checker();
    });

    $('#inputLastName').keyup(function () {
        checker();
    });

    $('#inputPassword').keyup(function () {
        checker();
    });

    $('#inputEmail').keyup(function () {
        checker();
    })

    
});