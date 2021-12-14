@extends('layouts.app')

@section('content')

    <div class="container container-dishes-index"> 

        @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
                
            </div>
        @endif

        <a class="btn btn-secondary mb-3" href="{{ route('admin.dishes.create') }}">crea un nuovo piatto</a>
        
        <a class="btn btn-secondary mb-3" href='{{ route('admin.dashboard')}}'> Torna indietro</a>
        
        
        <h2>Lista Piatti</h2>
        
        <table class="table">
            
            <thead>
            <tr>
                <th scope="col">Nome del piatto</th>
                <th scope="col">Disponibilità</th>
                <th scope="col">Modifica</th>
                <th scope="col">Elimina</th>
            </tr>
            </thead>
            
            <tbody>
                @forelse ($dishes as $dish)
                    <tr>
                        <th scope="row"><a href="{{ route('admin.dishes.show', $dish->id)}}"><h3>Nome piatto: {{ $dish->name }}</h3></a></th>
                        <th scope="row"><h3> @if($dish->available == 1 ) disponibile @else non disponibile @endif</h3></th>
                        <td><a class="btn btn-primary" href="{{ route('admin.dishes.edit', $dish->id) }}">Edit</a></td>
                        <td>
                            
                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Non ci sono piatti disponibili</td>
                    </tr>
                @endforelse ($dishes as $dish)


            </tbody>
        </table>
    
    </div>
    
    
@endsection