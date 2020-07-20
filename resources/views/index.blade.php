<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>
        <div id="app">
            <v-app>
                <v-main>
                    <app-header></app-header>
                    <v-container>
                        <v-row>
                            @foreach ($products as $key => $product)
                                <v-col cols="12" sm="6" md="4" key="{{$key}}" class="d-flex">
                                    <product :item="{{$product}}"></product>
                                </v-col>
                            @endforeach
                        </v-row>
                    </v-container>
                    <app-footer></app-footer>
                </v-main>
            </v-app>
        </div>
    </body>
</html>
