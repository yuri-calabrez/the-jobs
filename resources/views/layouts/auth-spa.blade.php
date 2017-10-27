<!doctype html>
<html lang="{{app()->getLocale()}}" itemscope itemtype="https://schema.org/WebSite">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Login - The Jobs</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Favicons -->
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
</head>
<body class="login-page">


<main>

    <div class="login-block">
        @yield('content')
    </div>

    <div class="login-links">
        @yield('login-links')
    </div>

</main>

</body>
</html>