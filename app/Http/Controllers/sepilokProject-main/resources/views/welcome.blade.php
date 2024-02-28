<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sepilok Orangutan Rehabilitation Centre</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="style.css">

      
    </head>
    <body>
        <div class='sidebar'>
            
            @if (Route::has('login'))
                <div class='top'>
                <div class="logo">
                <i class="bx bxl-codepen"></i>
                <a href="home" class="logo">Sepilok Rehabilitation Centre</a>
            </div>
                    @auth

                        @if(in_array(auth()->user()->usertype, ['admin', 'staff']))

                        <ul>
                            <li>
                            <a href="{{ url('/home') }}">Dashboard</a>
                            </li>
                        </ul>
                        @else
                        <ul>
                            <li>
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        </ul>
                        @endif
                    @else

                    <ul>
                        <li>
                        <a href="{{ route('login') }}">Log in</a>
                        </li>
                    </ul>

                        @if (Route::has('register'))
                        <ul>
                            <li>
                            <a href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        @include('main_page')
    </body>
</html>
