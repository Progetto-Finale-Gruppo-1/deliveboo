<div class="container">
    {{-- @dd($dish) --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>        
    @endif
    
    <form action="{{ request()->routeIs('admin.dishes.create') ? route('admin.dishes.store') : route('admin.dishes.update', $dish->id) }}" method="POST">
        @csrf

        @if ( request()->routeIs('admin.dishes.edit') )

            @method('PATCH')

        @endif
        
        <div class="mb-3">
            <label for="name" class="form-label">Nome del piatto</label>
            <input type="text" class="form-control" id="name" placeholder="Example input placeholder" value="{{ request()->routeIs('admin.dishes.edit') ? $dish->name : '' }}" name="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <input type="text" class="form-control" id="description" placeholder="Another input placeholder" value="{{ request()->routeIs('admin.dishes.edit') ? $dish->description : '' }}" name="description">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" min="0" max="9999" class="form-control" id="price" placeholder="Another input placeholder" value="{{ request()->routeIs('admin.dishes.edit') ? $dish->price : '' }}" name="price">
        </div>

        <div class="mb-3">
            <label for="weigth" class="form-label">Peso</label>
            <input type="text" class="form-control" id="weigth" placeholder="Another input placeholder" value="{{ request()->routeIs('admin.dishes.edit') ? $dish->weigth : '' }}" name="weigth">
        </div>

        <div class="form-check mb-5 avaliable">
            <input class="form-check-input" type="checkbox" value="0" id="available" name="available">
            <label class="form-check-label" for="available"> Available </label>
        </div>


        <button class="btn btn-success" type="submit">{{ request()->routeIs('admin.dishes.edit') ? 'Modifica' : 'Crea' }}</button>
        
        @if ( request()->routeIs('admin.dishes.create') )
            <button class="btn btn-danger" type="reset">Reset</button>
        @endif
        
    </form>
</div>