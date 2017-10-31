@extends('layouts.auth-app')

@section('content')
    <img src="{{asset('images/logo.png')}}" alt="">
    <h1>Digite suas credenciais abaixo</h1>

    <form action="{{route('register.candidate')}}" method="POST">
        @include('auth.app._form-register')
    </form>
    <div class="login-footer">
        <h6>Ou faça o cadastro com</h6>
        @include('auth.app._social')
    </div>
@endsection

@section('login-links')
    <p class="text-center">Já possui uma conta?
        <a class="txt-brand" href="{{route('login.candidate')}}" title="Login">Login</a>
    </p>
@endsection