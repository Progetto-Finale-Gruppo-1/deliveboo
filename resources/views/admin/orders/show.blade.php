@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Dettaglio Ordine
            </div>
            <div class="card-body">
                <h5 class="card-title"> Nome e Cognome: {{$order->name . ' ' .$order->surname}} </h5>
                <address class="card-title"> Indirizzo: {{$order->city . ', ' . $order->address . ', ' . $order->zip_code}} </address>
                <address class="card-text"> Numero di telefono: {{ $order->phone}} </address>
                {{-- <p class="card-text">{{ $order->dishes['user_id']}} </p> --}}
                <a href="{{ route('admin.orders.index')}}" class="btn btn-primary">Torna alla lista degli ordini</a>
            </div>
        </div>
    </div>
@endsection