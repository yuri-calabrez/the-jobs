@extends('layouts.auth-app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <img src="{{asset('images/logo.png')}}" alt="">
    <h1>Resetar senha</h1>

    <form action="{{route('password.reset.store')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-email"></i></span>
                <input type="text" name="email" value="{{ $email or old('email') }}"
                       required class="form-control" placeholder="E-mail">
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-unlock"></i></span>
                <input type="password" name="password" value="" required class="form-control" placeholder="Senha">
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-unlock"></i></span>
                <input type="password" name="password_confirmation" value="" required class="form-control" placeholder="Confirmar senha">
            </div>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <button class="btn btn-primary btn-block" type="submit">Resetar senha</button>
    </form>
@endsection