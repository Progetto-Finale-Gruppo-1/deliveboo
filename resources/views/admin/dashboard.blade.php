@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h2>Nome Ristorante: {{ $user->name }}</h2>

                    <div>
                        <img class="img-fluid" src="{{ $user->getImagePrefix() . $user->image}}" alt="{{$user->name}} copertina immagine">
                    </div>
                    <a href="{{ route('admin.dishes.index')}}">I tuoi Piatti</a>
                    
                    <a href="{{ route('admin.orders.index')}}">Ordini ricevuti</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
