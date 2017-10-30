@extends('layouts.auth-app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <img src="{{asset('images/logo.png')}}" alt="">
    <h1>Recuperar senha</h1>

    <form action="{{route('password.email')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-email"></i></span>
                <input type="text" name="email" value="" required class="form-control" placeholder="E-mail">
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <button class="btn btn-primary btn-block" type="submit">Recuperar senha</button>
    </form>
@endsection

@section('login-links')
    <p class="text-center"><a href="{{URL::previous()}}" title="Voltar">Voltar para o login</a></p>
@endsection