@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <table class="table">
            
                <thead>
                <tr>
                    <th scope="col">N. Ordine</th>
                    <th scope="col">Nome & Cognome</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Data Ordine</th>
                </tr>
                </thead>
                
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->name . ' ' .$order->surname}}</td>                            
                            <td>{{$order->phone}}</td>
                            <td>{{$order->city . ', ' . $order->address . ', ' . $order->zip_code}}</td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Non ci sono ordini disponibili</td>
                        </tr>
                    @endforelse
    
                </tbody>
            </table>

        </div>
    </div>
@endsection