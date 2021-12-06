@extends('layouts.app')

@section('content')
    <h2>Lista Piatti</h2>
    @foreach ($dishes as $dish)
        <h3>Nome piatto: {{ $dish->name }}</h3>
    @endforeach
@endsection