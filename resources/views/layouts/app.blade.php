<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Pizza Delivery') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<div id="app">
    <v-app>
        <header>
            <div class="container">
                <div class="row header-row">
                    <div class="col-12 col-sm-4"></div>
                    <div class="col-12 col-sm-4">
                        <a href="/" class="logo"></a>
                    </div>
                    <div class="d-flex justify-content-end col-12 col-sm-4">
                        @if(!in_array(Route::currentRouteName(), ['cart', 'order']))
                        <header-cart :cart="{{ json_encode(session('cart')) }}"></header-cart>
                        @endif
                    </div>
                </div>
            </div>
        </header>
        <v-main>
            <v-container>@yield('content')</v-container>
        </v-main>
        <v-footer>
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col d-flex justify-content-end">{{ date('Y') }}&nbsp;—&nbsp;<strong>Pizza Delivery Service</strong></div>
                    <div class="col"></div>
                </div>
            </div>
        </v-footer>
    </v-app>
</div>
</body>
</html>

