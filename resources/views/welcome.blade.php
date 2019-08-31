<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/getLeads') }}">Home</a>
                    @else
                        <!-- <a href="{{ route('login') }}">Login</a> -->

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}">Register</a> -->
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Drink Prime
                </div>
                @if (Route::has('login'))
                    @auth
                    <a href="{{ url('/getLeads') }}" style="border:1px solid grey;border-radius:20px;padding:10px;text-decoration:none">
                    Go Inside</a>
                    @else     
                    <div class="links">
                        <a href="{{ route('login') }}" style="border:1px solid grey;border-radius:20px;padding:10px;">Login</a>
                    </div>
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>
