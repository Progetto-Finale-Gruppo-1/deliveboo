@extends('layouts.app')

@section('content')
    <h2>Lista Piatti</h2>
    
    @foreach ($dishes as $dish)
        <h3>Nome piatto: {{ $dish->name }}</h3>
        <a href="{{ route('admin.dishes.edit', $dish->id) }}">modifica</a> <br>
    @endforeach
    <a href="{{ route('admin.dishes.create') }}">crea un nuovo piatto</a>
    
@endsection