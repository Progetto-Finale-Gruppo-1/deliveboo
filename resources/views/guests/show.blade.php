@extends('layouts.app')

@section('content')
    <show-component :dato="{{$user->id}}"></show-component>
@endsection

@section('script')
    <script src="{{ asset('js/front.js')}}"></script>
@endsection