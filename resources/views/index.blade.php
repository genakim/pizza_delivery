@extends('layouts.app')

@section('content')
    <v-row>
        @foreach ($products as $key => $product)
            <v-col cols="12" sm="6" md="4" key="{{$key}}" class="d-flex">
                <product :item="{{$product}}"></product>
            </v-col>
        @endforeach
    </v-row>
@endsection
