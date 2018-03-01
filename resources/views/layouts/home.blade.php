@extends('main')


@section('header')
    <div class="header">
        <div class="container">
            <h1 align="center" class="main-text"> Test application</h1>
        </div>
    </div>
@endsection


@section('menu')
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Home</a>
            @if(!Sentinel::check())
            <a class="navbar-brand" href="{{route('registerPage')}}">Registration</a>
            <a class="navbar-brand" href="{{route('authPage')}}">Login</a>
            @endif
            @if(Sentinel::check())
            <a class="navbar-brand" href="{{route('logout')}}">Logout</a>
                <a class="navbar-brand" href="{{route('userPage')}}">Private page</a>
            @endif
        </div>
    </nav>
@endsection


@section('content')
    <div class="container">
        @yield('welcome')
        @yield('register_form')
        @yield('auth_form')
        @yield('private_room')
    </div>
@endsection


@section('footer')
    <div class="footer">
        <div class="container">
            <h4 align="center" class="main-text">made in Shurik</h4>
        </div>
    </div>
@endsection

