@extends('layouts.app')

@section('content')

    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
        
    </div>
    @endif

    <h1>{{$dish->name}}</h1>
    <div class="mb-3">
        <img src="{{ $dish->getImagePrefix() . $dish->image}}" alt="">
    </div>  
    <a href=" {{ route('admin.dishes.index')}}" class="btn btn-primary">Torna alla lista dei piatti</a>
    <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Elimina il piatto</button>
    </form>
@endsection