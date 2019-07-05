<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#113f7c">
        <meta name="msapplication-navbutton-color" content="#113f7c">
        <meta name="apple-mobile-web-app-status-bar-style" content="#113f7c">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Billeci Cases') }}</title>

        <link rel="icon" href="{{asset('img/iconsmall.png')}}" sizes="128x128" type="image/png">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
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
                    <img src="{{ asset('img/icon.png') }}" alt="icon" class="img-logo">
                    <br>
                    <img src="{{ asset('img/allc.png') }}" alt="icon" class="img-bg-logo">

                    <p>The best flight-cases to protect your equipment.<br>
                        Build your own case and pay on delivery.</p>

                    <a id="btn-start" href="{{ url('/login') }}">Build your Own</a>
                </div>
            </div>

            <div id="features">
                <div class="content-features">
                    <h2>For all the Needs</h2>
                    <p>Thanks to the vast possibilities of using different materials it was possible to apply the characteristics of the flight case also for special productions such as large sets, stages and exhibition modules, always obtaining results of great effect and originality.</p>

                    <h2>Materials</h2>
                    <p>We use multilayers of various thicknesses, according to the degree of resistance required. Covered with special laminates. The phenolic bonding of the layers, carried out with an oleodynamic press, guarantees an excellent resistance to thermal shocks. For the assembly of the parts aluminum profiles are used, recessed closures and handles, fixed or detachable wheels and transpallet supports. Great care is also dedicated to the design and construction of the interiors designed to protect the objects transported.</p>

                    <h2>Features</h2>
                    <p>In addition to its robustness
                        and versatility can also be: Fireproof, Raincoats, Soundproofed,
                        Antistatic, Equipped with a controlled atmosphere, With power supply
                        With internal lighting, With forced ventilation.</p>
                </div>
            </div>

            <div class="bg-footer">
                <div class="footer">
                    <div class="m-hr" style="height: 1px; opacity: 0.5; background-color: #fff; width: 100%; margin: auto"></div>
                    <table class="footer-table" style="margin: auto">
                        <th style="border-bottom: 0px solid #00000000;">
                            <div class="div-t1">
                                <table class="table-social">
                                    <th><a href="/about">About</a></th>
                                    <th><a href="/contact">Contact</a></th>
                                </table>
                            </div>
                        </th>
                    </table>
                </div>

                <div class="footer-bar" style="margin-bottom: 0px">© 2019 Copyright:
                    <a href="https://codedix.com" target="_blank" id="link-this"> codedix.com</a>
                    <a href="https://codedix.com/privacy/" target="_blank" id="link-privacy">Privacy Policy</a>
                </div>
            </div>
        </div>
    </body>

</html>
