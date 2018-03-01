@extends('layouts.home')

@section('private_room')

    <script src="{{asset('js/private_page.js')}}"></script>

    <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminTaskModalLabel">User data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>EDIT</h5>
                    <form id="editUserDataForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="userNameField" class="col-form-label">New name:</label>
                            <input type="text" class="form-control" id="userNameField" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="lastNameField" class="col-form-label">New last name:</label>
                            <input type="text" class="form-control" id="lastNameField" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="emailField" class="col-form-label">New email:</label>
                            <input type="email" class="form-control" id="emailField" name="email">
                            <p id="emailErrorMessage" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label for="passField" class="col-form-label">New password:</label>
                            <input type="password" class="form-control" id="passField" name="password">
                        </div>
                        <div class="form-group">
                            <label for="passConfirmField" class="col-form-label">Confirm password:</label>
                            <input type="password" class="form-control" id="passConfirmField">
                            <p id="passordErrorMessage" style="color: red"></p>
                        </div>
                    </form>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendUserData">Send data</button>

                </div>
            </div>
        </div>
    </div>


        <div id="user_list">

    </div>

@endsection