@extends('layouts.home')

@section('welcome')

    @if(isset($message))
        <h1 align="center">{{$message}}</h1>
    @else
        <div class="welcome-block">
            <h1 align="center">Welcome!</h1>
            <br>
            <h2 align="center">Go to registration page or login!</h2>
            @yield('test')
        </div>
    @endif
    @endsection