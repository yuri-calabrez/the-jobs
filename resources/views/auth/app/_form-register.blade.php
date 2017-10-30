{{csrf_field()}}
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="ti-user"></i></span>
        <input type="text" name="name" value="{{old('name')}}" required class="form-control" placeholder="Seu nome">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<hr class="hr-xs">

<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><i class="ti-email"></i></span>
        <input type="text" value="{{old('email')}}" required name="email" class="form-control"
               placeholder="Seu endereço de e-mail">
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
        <input type="password" required name="password" class="form-control" placeholder="Sua senha">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong class="text-danger">{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<button class="btn btn-primary btn-block" type="submit">Cadastrar</button>