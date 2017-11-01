<!doctype html>
<html lang="{{app()->getLocale()}}" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Post a job position or create your online resume by TheJobs!">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>The Jobs</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Favicons -->
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
</head>
<body class="nav-on-header smart-nav">
<!-- Navigation bar -->
<nav class="navbar">
    <div class="container">

        <!-- Logo -->
        <div class="pull-left">
            <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>

            <div class="logo-wrapper">
                <a class="logo" href="#"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
                <a class="logo-alt" href="#"><img src="{{asset('images/logo-alt.png')}}" alt="logo-alt"></a>
            </div>

        </div>
        <!-- END Logo -->


        <!-- Navigation menu -->
        <div class="pull-right">
            <ul class="nav-menu">
                @if(Auth::check())
                   @include('app._menuIn')
                    <li>
                        <a href="{{route('logout')}}" title="Logout"
                           onclick="event.preventDefault();document.getElementById('formLogout').submit()">Logout</a>
                        <form id="formLogout" method="POST" action="{{route('logout')}}">
                            {{csrf_field()}}
                        </form>
                    </li>
                @else
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Sobre</a>
                    </li>
                    <li>
                        <a href="#">Como funciona</a>
                    </li>
                    <li>
                        <a href="#">Contato</a>
                    </li>
                    <li>
                        <a href="#" title="Login">Login</a>
                        <ul>
                            <li><a href="{{route('login.recruiter')}}" title="Recrutador">Recrutador</a></li>
                            <li><a href="{{route('login.candidate')}}" title="Candidato">Candidato</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>

        <!-- END Navigation menu -->
    </div>
</nav>
<!-- END Navigation bar -->
<main id="app">
    @include('messages.flash-messages')
    @yield('content')
</main>

<!-- Site footer -->
<footer class="site-footer">

    <!-- Top section -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">An employment website is a web site that deals specifically with employment or
                    careers. Many employment websites are designed to allow employers to post job requirements for a
                    position to be filled and are commonly known as job boards. Other employment sites offer employer
                    reviews, career and job-search advice, and describe different job descriptions or employers. Through
                    a job website a prospective employee can locate and fill out a job application.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>The Jobs</h6>
                <ul class="footer-links">
                    <li><a href="page-about.html">Sobre nós</a></li>
                    <li><a href="page-typography.html">Como funciona</a></li>
                    <li><a href="page-faq.html">FAQ</a></li>
                    <li><a href="page-typography.html">Políticas de privacidade</a></li>
                    <li><a href="page-contact.html">Contato</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Trendeing jobs</h6>
                <ul class="footer-links">
                    <li><a href="job-list.html">Front-end developer</a></li>
                    <li><a href="job-list.html">Android developer</a></li>
                    <li><a href="job-list.html">iOS developer</a></li>
                    <li><a href="job-list.html">Full stack developer</a></li>
                    <li><a href="job-list.html">Project administrator</a></li>
                </ul>
            </div>
        </div>

        <hr>
    </div>
    <!-- END Top section -->

    <!-- Bottom section -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyrights &copy; 2016 All Rights Reserved by <a
                            href="http://themeforest.net/user/shamsoft">ShaMSofT</a>.</p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END Bottom section -->

</footer>
<!-- END Site footer -->


<!-- Back to top button -->
<a id="scroll-up" href="#"><i class="ti-angle-up"></i></a>
<script src="{{asset('js/the-jobs.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>