@extends('layouts.home')

@section('welcome')

        <div class="welcome-block">
            @if(isset($message))
                <h1 align="center">{{$message}}</h1>
        </div>
            @else
            <h1 align="center">Welcome!</h1>
            <br>
            <h2 align="center">Go to registration page or login!</h2>
        </div>
    @endif
    @endsection