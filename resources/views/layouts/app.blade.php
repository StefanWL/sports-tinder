<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sports Tinder</title>
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="row justify-content-center">
        <div class="col-10 col-md-4">
            @auth
            <form class="" action="{{ route('logout') }}" method="post">
                @csrf
                <nav class="navbar navbar-expand-xl bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 btn-group">
                                <a class="btn btn-outline-dark nav-item" href="{{ route('profile') }}">Profile</a>
                                <a class="btn btn-outline-dark nav-item" href="{{ route('dashboard') }}">Dashboard</a>
                                <a class="btn btn-outline-dark nav-item" href="{{ route('conversations') }}">Conversations</a>
                                <a class="btn btn-outline-dark nav-item" href="{{ route('teams') }}">Teams</a>
                                <button class="btn btn-danger nav-item" type="submit">Logout</button>
                            </ul>
                        </div>
                    </div>
                </nav>
            </form>
            @endauth
            @yield('content')
        <div>
    </body>
</html>
