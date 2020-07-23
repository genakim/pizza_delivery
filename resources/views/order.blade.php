@extends('layouts.app')

@section('content')
    <h1>Your Order</h1>
    <v-row>
        <v-col cols="12" sm="6">
            <order-form></order-form>
        </v-col>
        <v-col cols="12" sm="6">
            <order-list
                :items="{{ json_encode($items) }}"
                :total="{{ json_encode($total) }}"
            ></order-list>
        </v-col>
    </v-row>
@endsection
