@extends('layouts.home')

@section('register_form')
    <h1 align="center" class="custom_forms">Please, register now</h1>
    <hr>

    <form action="{{route('registerForm')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Enter name">
            <small class="form-text text-muted">Input your name:</small>
        </div>
        <div class="form-group">
            <label for="inputLastName">Last name</label>
            <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Enter last name">
            <small class="form-text text-muted">Input your last name:</small>
        </div>
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Enter email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    @endsection