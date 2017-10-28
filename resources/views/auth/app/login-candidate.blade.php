@extends('layouts.auth-app')

@section('content')
    <img src="{{asset('images/logo.png')}}" alt="">
    <h1>Digite suas credenciais abaixo</h1>

    <form action="">
        @include('auth.app._form')
        <div class="login-footer">
            <h6>Ou faça o login com</h6>
            @include('auth.app._social')
        </div>
    </form>
@endsection

@section('login-links')
    <a class="pull-left" href="{{route('password.request')}}">Esqueci minha senha?</a>
    <a class="pull-right" href="{{route('login.register.candidate')}}">Criar uma conta</a>
@endsection