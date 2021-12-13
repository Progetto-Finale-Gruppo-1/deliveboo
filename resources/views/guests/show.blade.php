@extends('layouts.app')

@section('content')
    <h2>Ristorante: {{$user->name}}</h2>
    <menu-component :dato="{{ $dishes }}"></menu-component>
@endsection

@section('script')
    <script src="{{ asset('js/front.js')}}"></script>
@endsection