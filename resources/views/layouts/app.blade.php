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
        <v-main>
            <app-header :cart="{{ json_encode(session('cart')) }}"></app-header>
            <v-container>
                @if(isset($breadcrumbs))
                    <v-breadcrumbs :items="{{ json_encode($breadcrumbs) }}"></v-breadcrumbs>
                @endif
                @yield('content')
            </v-container>
            <app-footer></app-footer>
        </v-main>
    </v-app>
</div>
</body>
</html>

