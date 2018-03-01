@extends('layouts.home')

@section('auth_form')

    <script src="{{asset('js/auth_form.js')}}"></script>

    <h1 align="center" class="custom_forms">Please, enter your email and password</h1>
    <hr>
    @include('errors.errors')
    <form action="{{route('authForm')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
        </div>
        <button type="submit" id="auth_submit" class="btn btn-primary">Login</button>
    </form>
    <p id="warningMessage" style="color: red">Input correct data</p>
    @if(isset($message))
        <p align="center">{{$message}}</p>
    @endif

@endsection