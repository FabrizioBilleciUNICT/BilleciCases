<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Billeci Cases') }}</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}">
    </head>

    <body>
        <div class="full-height">
            <div class="top-right links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>

            <div class="content">
                <div class="welcome-content">
                    <img src="{{ asset('img/e.png') }}" alt="icon" class="img-logo">

                    <img src="{{ asset('img/allc.png') }}" alt="icon" height="100px">

                    <p>AAA</p>

                    <a id="btn-start" href="{{ url('/dashboard') }}">Build your Own</a>
                </div>




                <!--<div class="title m-b-md">
                   {{ config('app.name', 'Billeci Cases') }}
                </div>

                <div class="links">
                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>
                </div>-->
            </div>
        </div>
    </body>

</html>
