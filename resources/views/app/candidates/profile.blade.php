@extends('layouts.app')

@section('content')
    <div class="site-header size-sm"></div>

    <div class="container main">

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <input type="file" class="dropify" data-default-file="/images/avatar.jpg">
                    <span class="help-block">Imagem PNG ou JPG</span>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <input type="text" disabled class="form-control input-lg" placeholder="Nome">
                </div>

                <div class="form-group">
                    <input type="text" name="headline" class="form-control" placeholder="Profissão (e.x. Front-end developer)">
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="description" rows="3" placeholder="Uma breve descrição sobre você"></textarea>
                </div>

                <hr class="hr-lg">

                <h6>Informações basicas</h6>
                <div class="row">

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" name="address" class="form-control" placeholder="Bela Vista, 1120, São Paulo - SP">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                            <input type="text" name="website" class="form-control" placeholder="Website">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                            <input type="text" name="salarary" class="form-control" placeholder="Salário, ex. 6500,00">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                            <input type="text" name="age" class="form-control" placeholder="Idade">
                            <span class="input-group-addon">anos</span>
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="phone" class="form-control" placeholder="Telefône">
                        </div>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" disabled class="form-control" placeholder="E-mail">
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
                                <input type="text" name="facebook" class="form-control" placeholder="https://">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                <input type="text" name="github" class="form-control" placeholder="https://">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                <input type="text" name="linkedin" class="form-control" placeholder="https://">
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
    </div>

@endsection