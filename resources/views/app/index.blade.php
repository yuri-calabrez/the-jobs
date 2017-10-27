@extends('layouts.app')

@section('content')
    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url({{'images/bg-banner1.jpg'}})">
        <div class="container">
            <div class="col-xs-12">
                <br><br>
                <h2>Nós oferecemos
                    <mark>1,259</mark>
                    vagas agora mesmo!
                </h2>
                <h5 class="font-alt">Encontre a sua vaga em minutos!</h5>
                <br><br><br>
                <form class="header-job-search">
                    <div class="input-keyword">
                        <input type="text" class="form-control" placeholder="Skills, Empresa e etc">
                    </div>

                    <div class="input-location">
                        <input type="text" class="form-control" placeholder="Cidade ou estado">
                    </div>

                    <div class="btn-search">
                        <button class="btn btn-primary" type="submit">Achar vagas</button>
                        <a href="#">Filtro avançado</a>
                    </div>
                </form>
            </div>

        </div>
    </header>
    <!-- END Site header -->

    <!-- Recent jobs -->
    <section>
        <div class="container">
            <header class="section-header">
                <span>Latest</span>
                <h2>Recent jobs</h2>
            </header>

            <div class="row item-blocks-connected">

                <!-- Job item -->
                @for($i = 1; $i < 5; $i++)
                    <div class="col-xs-12">
                        <a class="item-block" href="#">
                            <header>
                                <img src="{{asset('images/logo-google.jpg')}}" alt="">
                                <div class="hgroup">
                                    <h4>Senior front-end developer</h4>
                                    <h5>Google</h5>
                                </div>
                                <div class="header-meta">
                                    <span class="location">Menlo park, CA</span>
                                    <span class="label label-success">Full-time</span>
                                </div>
                            </header>
                        </a>
                    </div>
            @endfor
            <!-- END Job item -->
            </div>

            <br><br>
            <p class="text-center"><a class="btn btn-info" href="#">Ver todos</a></p>
        </div>
    </section>
    <!-- END Recent jobs -->

    <!-- How it works -->
    <section class="bg-alt">
        <div class="container">

            <div class="col-sm-12 col-md-6">
                <header class="section-header text-left">
                    <span>Workflow</span>
                    <h2>Como funciona</h2>
                </header>

                <p class="lead">Pellentesque et pulvinar orci. Suspendisse sed euismod purus. Pellentesque nunc ex,
                    ultrices eu enim non, consectetur interdum nisl. Nam congue interdum mauris, sed ultrices augue
                    lacinia in. Praesent turpis purus, faucibus in tempor vel, dictum ac eros.</p>
                <p>Nulla quis felis et orci luctus semper sit amet id dui. Aenean ultricies lectus nunc, vel rhoncus
                    odio sagittis eu. Sed at felis eu tortor mattis imperdiet et sed tortor. Nullam ac porttitor arcu.
                    Vivamus tristique elit id tempor lacinia. Donec auctor at nibh eget tincidunt. Nulla facilisi. Nunc
                    condimentum dictum mattis.</p>


                <br><br>
                <a class="btn btn-primary" href="#">Saiba mais</a>
            </div>

            <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
                <br>
                <img class="center-block" src="{{asset('images/how-it-works.png')}}" alt="Como funciona">
            </div>

        </div>
    </section>
    <!-- END How it works -->

    <!-- Categories -->
    <section class="bg-alt">
        <div class="container">
            <header class="section-header">
                <span>Categorias</span>
                <h2>Categorias populares</h2>
                <p>Aqui as categorias mais buscadas pelos candidatos</p>
            </header>

            <div class="category-grid">
                <a href="job-list-1.html">
                    <i class="fa fa-laptop"></i>
                    <h6>Tecnologia</h6>
                    <p>Designer, Developer, IT Service, Front-end developer, Project management</p>
                </a>

                <a href="job-list-2.html">
                    <i class="fa fa-line-chart"></i>
                    <h6>Accounting</h6>
                    <p>Finance, Tax service, Payroll manager, Book keeper, Human resource</p>
                </a>

                <a href="job-list-3.html">
                    <i class="fa fa-medkit"></i>
                    <h6>Médica</h6>
                    <p>Doctor, Nurse, Hospotal, Dental service, Massagist</p>
                </a>

                <a href="job-list-1.html">
                    <i class="fa fa-cutlery"></i>
                    <h6>Alimentos</h6>
                    <p>Restaurant, Food service, Coffe shop, Cashier, Waitress</p>
                </a>

                <a href="job-list-2.html">
                    <i class="fa fa-newspaper-o"></i>
                    <h6>Media</h6>
                    <p>Journalism, Newspaper, Reporter, Writer, Cameraman</p>
                </a>

                <a href="job-list-3.html">
                    <i class="fa fa-institution"></i>
                    <h6>Governo</h6>
                    <p>Federal, Law, Human resource, Manager, Biologist</p>
                </a>
            </div>

        </div>
    </section>
    <!-- END Categories -->

    <!-- Newsletter -->
    <section class="bg-img text-center" style="background-image: url({{asset('images/bg-facts.jpg')}})">
        <div class="container">
            <h2><strong>Inscreva-se</strong></h2>
            <h6 class="font-alt">Receba nossa newsletter</h6>
            <br><br>
            <form class="form-subscribe" action="#">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Seu endereço de e-mail">
                    <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Inscrever</button>
              </span>
                </div>
            </form>
        </div>
    </section>
    <!-- END Newsletter -->
@endsection
