@extends('layouts.app')

@section('content')
<div class="container container-dashboard">
    <!-- Contenitore generale contenuti -->
    <div class="row justify-content-center">
        <div class="col-lg-12">

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            
            <div class="container-status col-lg-3 col-9 col-md-4">
                <p class="status-info white-butt mb-4">{{ __('Login effettuato!') }}</p>
            </div>

            <!-- contenitore username e bottoni di reindirizzamento -->
                <div class="row justify-content-between">
                    <h2 class="col-lg-7 col-12">Bentornato: {{ $user->name }}</h2>

                    <div class="container-button align-self-center pb-4 col-lg-5 col-12">
                        <a class="prim-butt col-1 mr-1" href="{{ route('admin.dishes.index')}}">I tuoi Piatti</a>
                        <a class="sec-butt col-1" href="{{ route('admin.orders.index')}}">Ordini ricevuti</a>
                    </div>
                </div>
                
                
                <div class="container-img mt-2">
                    <img class="img-fluid" src="{{ $user->getImagePrefix() . $user->image}}" alt="{{$user->name}} copertina immagine">
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
