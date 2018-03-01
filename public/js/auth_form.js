$(document).ready(function () {

    $('#auth_submit').prop('disabled', true);

    let pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;

    function checker() {
        if($('#inputPassword').val() !== '' &&
            pattern.test($('#inputEmail').val())){
            $('#auth_submit').prop('disabled', false);
            $('#warningMessage').hide();
        }else {
            $('#auth_submit').prop('disabled', true);
        }
    }

    $('#inputPassword').keyup(function () {
        checker();
    });

    $('#inputEmail').keyup(function () {
        checker();
    })


});