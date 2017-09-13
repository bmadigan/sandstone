<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Pilaster Digital - Sandstone') }}</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>;
            window.App = { stripePublicKey: '{{ config('services.stripe.key') }}' };
        </script>

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

            @yield('content')

        </div><!--/full-height #app -->

        <script src="https://checkout.stripe.com/checkout.js"></script>
        <flash message="{{ session('flash') }}" css="{{ session('css') }}"></flash>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
