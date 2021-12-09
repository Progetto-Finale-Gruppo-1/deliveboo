@extends('layouts.app')

@section('content')
    <h1>{{$dish->name}}</h1>
    <img src="{{ $dish->getImagePrefix() . $dish->image}}" alt="">
@endsection