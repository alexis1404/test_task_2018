$(document).ready(function () {

    let current_user_id = null;
    let pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
    let error_email;
    let error_password;

    userRequest();

    $( document ).on( "click", "#buttonEdit", function() {
        event.preventDefault();
        $('#userEditModal').modal('show');
    });

    $('#sendUserData').click(function () {
        event.preventDefault();
        errorMessageFormHidder();
        let isSend = confirm('Are you sure?');
        if(isSend){

            if($('#emailField').val() !== '') {
                if (pattern.test($('#emailField').val())) {
                    error_email = false;
                } else {
                    error_email = true;
                    $('#emailErrorMessage').text('Incorrect email!');
                }
            }

            if($('#passField').val() !== '') {
                if ($('#passField').val() === $('#passConfirmField').val()) {
                    error_password = false;
                } else {
                    error_password = true;
                    $('#passordErrorMessage').text('Password not confirmed!');
                }
            }

            if(!error_password && !error_email){
                let form = $('#editUserDataForm');
                let formData = new FormData(form.get(0));
                editUser(formData);
            }
        }
    });

    $('#emailField').keyup(function () {
        errorMessageFormHidder();
    });

    $('#passField').keyup(function () {
        errorMessageFormHidder();
    });

    $('#passConfirmField').keyup(function () {
        errorMessageFormHidder();
    });

    //functions----------------------------------------
    function editUser(form_data) {
        $.ajax({
            url: '/edit_user/' + current_user_id,
            method: 'POST',
            contentType: false,
            processData: false,
            data: form_data,
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                setTimeout("$('#userEditModal').modal('hide');", 500);
                $('#user_list').empty();
                userRequest();
            }

        });
    }

    function userRequest() {
        $.ajax({
            url: "/get_user",
            success: function (result) {
                $('#user_list').append(
                    '<div class="card" style="width: 20rem;">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">' + result.first_name +'</h5>' +
                    '</div>' +
                    '<ul class="list-group list-group-flush">' +
                    '<li class="list-group-item"><b>Email: </b> ' + result.email +'</li>' +
                    '<li class="list-group-item"><b>First name: </b> ' + result.first_name +'</li>' +
                    '<li class="list-group-item"><b>Last name: </b>' + result.last_name  +'</li>' +
                    '<li class="list-group-item"><b>Last login: </b>' + result.last_login  +'</li>' +
                    '</ul>' +
                    '<div class="card-body">' +
                    '<a href="#" id="buttonEdit" class="btn btn-primary" data-target="#userEditModal">Edit data</a>' +
                    '</div>' +
                    '</div>'
                );

                current_user_id = result.id;
            }

        });

    }

    function errorMessageFormHidder() {
        $('#emailErrorMessage').empty();
        $('#passordErrorMessage').empty();
    }

});