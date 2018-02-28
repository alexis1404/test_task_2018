@extends('mail.mail_layout')

@section('mail_content')

    <p>Hello, {{$user->first_name}} !</p>
    <p>Activate your account by clicking <a href="{{env('APP_URL') . '/check_mail/' . $user->id}}">here</a></p>

@endsection