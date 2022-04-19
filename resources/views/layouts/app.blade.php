<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sprt</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/5a296e2226.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body class="row justify-content-center">
        <div class="col-10 col-md-4">
            @auth
                <nav class="d-flex justify-content-evenly  mt-4 mb-4">
                    <a class="nav-item" href="{{ route('user') }}"><i class="icon fa-solid fa-user fa-3x"></i></a>
                    <a class="nav-item" href="{{ route('dashboard') }}"><i class="icon fa-solid fa-baseball fa-3x"></i></a>
                    <a class="nav-item" href="{{ route('conversations') }}"><i class="icon fa-solid fa-message fa-3x"></i></a>
                    <a class="nav-item" href="{{ route('teams') }}"><i class="icon fa-solid fa-users fa-3x"></i></a>
                    <form class="" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn fs-5 rounded-pill purple heading-text nav-item" type="submit">Logout</button>
                    </form>
                </nav>
            @endauth
            @yield('content')
        <div>
    </body>
</html>
