@extends('layouts.app')

@section('content')
    <div class="site-header size-sm"></div>

    <div class="container main">
        <form action="{{route('candidate.profile.update')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <input type="file" class="dropify" data-default-file="/images/avatar.jpg">
                        <span class="help-block">Imagem PNG ou JPG</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                        <input type="text" value="{{$user->name}}"
                               disabled class="form-control input-lg" placeholder="Nome">
                    </div>

                    <div class="form-group{{ $errors->has('headline') ? ' has-error' : '' }}">
                        <input type="text" value="{{old('headline', $candidate->headline)}}"
                               required name="headline" class="form-control"
                               placeholder="Profissão (e.x. Front-end developer)">
                        @if ($errors->has('headline'))
                            <span class="help-block">
                                <strong>{{ $errors->first('headline') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <textarea class="form-control" required name="description" rows="3"
                                  placeholder="Uma breve descrição sobre você">
                            {{old('description', $candidate->description)}}
                        </textarea>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>

                    <hr class="hr-lg">

                    <h6>Informações basicas</h6>
                    <div class="row">

                        <div class="form-group col-xs-12 col-sm-6{{ $errors->has('address') ? ' has-error' : '' }}">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" value="{{old('address', $candidate->address)}}"
                                       required name="address" class="form-control"
                                       placeholder="Bela Vista, 1120, São Paulo - SP">
                            </div>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-xs-12 col-sm-6{{ $errors->has('website') ? ' has-error' : '' }}">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <input type="text" value="{{old('website', $candidate->website)}}"
                                       name="website" class="form-control" placeholder="Website">
                            </div>
                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-xs-12 col-sm-6{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                                <input type="text" value="{{old('salary', $candidate->salary)}}"
                                       required name="salary" class="form-control"
                                       placeholder="Salário, ex. 6500,00">
                            </div>
                            @if ($errors->has('salary'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('salary') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-xs-12 col-sm-6{{ $errors->has('age') ? ' has-error' : '' }}">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                <input type="text" value="{{old('age', $candidate->age)}}"
                                       required name="age" class="form-control" placeholder="Idade">
                                <span class="input-group-addon">anos</span>
                            </div>
                            @if ($errors->has('age'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('age') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-xs-12 col-sm-6{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" value="{{old('phone', $candidate->phone)}}"
                                       name="phone" class="form-control" placeholder="Telefône">
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-xs-12 col-sm-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" value="{{$user->email}}" disabled class="form-control" placeholder="E-mail">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <section>
                <div class="container">

                    <header class="section-header">
                        <span>Esteja conectado</span>
                        <h2>Midias sociais</h2>
                    </header>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" value="{{old('facebook', $candidate->facebook)}}"
                                           name="facebook" class="form-control" placeholder="https://">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                    <input type="text" value="{{old('github', $candidate->github)}}"
                                           name="github" class="form-control" placeholder="https://">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                    <input type="text" name="linkedin" value="{{old('linkedin', $candidate->linkedin)}}"
                                           class="form-control" placeholder="https://">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="button-group">
                <div class="action-buttons">
                    <div class="upload-button">
                        <button class="btn btn-block btn-primary"><i class="fa fa-floppy-o"></i> Salvar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection