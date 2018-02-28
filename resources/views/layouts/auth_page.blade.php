@extends('layouts.home')

@section('auth_form')
    <h1 align="center" class="custom_forms">Please, enter your email and password</h1>
    <hr>

    <form action="{{route('authForm')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    @if(isset($message))
        <p align="center">{{$message}}</p>
    @endif

@endsection