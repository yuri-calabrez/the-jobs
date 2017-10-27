@extends('layouts.auth-spa')

@section('content')
    <img src="{{asset('images/logo.png')}}" alt="">
    <h1>Recuperar senha</h1>

    <form action="#">

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-email"></i></span>
                <input type="text" class="form-control" placeholder="E-mail">
            </div>
        </div>

        <button class="btn btn-primary btn-block" type="submit">Recuperar senha</button>
    </form>
@endsection

@section('login-links')
    <p class="text-center"><a href="{{URL::previous()}}" title="Voltar">Voltar para o login</a></p>
@endsection