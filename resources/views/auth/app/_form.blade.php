{{csrf_field()}}
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="ti-email"></i></span>
        <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="E-mail">
        @if ($errors->has('email'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<hr class="hr-xs">

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="ti-unlock"></i></span>
        <input type="password" name="password" class="form-control" placeholder="Senha">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong class="text-danger">E-mail e ou senha inválidos</strong>
            </span>
        @endif
    </div>
</div>

<button class="btn btn-primary btn-block" type="submit">Login</button>