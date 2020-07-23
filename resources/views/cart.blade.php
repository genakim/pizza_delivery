@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>
    <v-row>
        <v-col cols="12">
            <cart :cart="{{ json_encode($cart) }}"></cart>
        </v-col>
    </v-row>
@endsection
