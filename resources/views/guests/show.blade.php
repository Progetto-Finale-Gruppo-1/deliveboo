@extends('layouts.app')

@section('content')
    <h2>Ristorante: {{$user->name}}</h2>
    <show-component :dato="{{ $dishes }}"></show-component>
@endsection

@section('script')
    <script src="{{ asset('js/front.js')}}"></script>
@endsection