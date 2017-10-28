@extends('layouts.auth-app')

@section('content')
    <img src="{{asset('images/logo.png')}}" alt="">
    <h1>Digite suas credenciais abaixo</h1>

    <form action="">
        @include('auth.app._form')
    </form>
@endsection

@section('login-links')
    <a class="pull-left" href="{{route('password.request')}}">Esqueci minha senha?</a>
    <a class="pull-right" href="{{route('login.register.recruiter')}}">Criar uma conta</a>
@endsection