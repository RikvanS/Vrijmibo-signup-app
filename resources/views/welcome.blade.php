@extends('layouts.app')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vrijmibo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

@section('content')
<div class="signup-list">
    <p>VMB signup pagina<br></p>

    <p>Aanwezig:</p>
        @foreach ($deelnemers as $deelnemer)

        <li>{{ $deelnemer->naam }}</li>
        @endforeach
</div>
@endsection
    </body>
</html>