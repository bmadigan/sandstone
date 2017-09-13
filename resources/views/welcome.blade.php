<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Pilaster Digital - Sandstone') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .full-height {
                height: 100vh;
            }
            .top-right {
                margin:0 0 25px 0;
                font-size:0.88em;
                text-align: right;
                padding:15px 20px;
                background-color: #fff;
                border-bottom:1px solid #e9e9e9;
            }
            .top-right a {
                padding-right: 5px;
            }
        </style>
    </head>
    <body class="bg-dark">
        <div class="full-height bg-soft flex-col" id="app">

            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}">Admin Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="bg-soft p-xs-y-5">
                <div class="container m-xs-b-4">
                    <div class="m-xs-b-6">

                        <div class="row">
                            <div class="card">
                                <div class="card-section">
                                    <h2 class="m-xs-b-4">Pilaster Sandstone</h2>
                                    <blockquote>> Many of the ancient pillars were built using Sandstone as a base material</blockquote>
                                    <p class="text-welcome">This is a sample boilerplate Laravel 5.5 application that creates several modules that you can
                                    easily integrate into a new project. The application comes with an <a href="{{ url('/dashboard') }}">Admin Backend</a> that you can log into using 'admin@pilasterdigital.com' with a password of 'secret'</p>
                                    <p class="text-welcome">For technical instructions, please see the <em>README</em> file in the Git repository</p>
                                    <p class="text-welcome">Below is a Sample <em>Ecommerce</em> Shopping Cart</p>
                                </div>
                            </div>
                        </div><!--/row-->

                        {{-- Sample Products --}}
                        <div class="row m-xs-t-4">
                            <div class="card">
                                <div class="card-section">
                                    <h2 class="m-xs-b-2">Sample Products</h2>


                                </div>
                            </div>
                        </div><!--/row-->

                    </div>
                </div>
            </div>

        </div><!--/full-height-->
    </body>
</html>
