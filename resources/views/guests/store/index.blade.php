@extends('layouts.app')

@section('content')

<h1>Store</h1>
@foreach ($dishes as $dish)
<div class="row">
    <div class="col-4">
        <p>{{ $dish->name }}</p>
    </div>
    <div class="col-4">
        {{ $dish->price }}
    </div>
    <div class="btn-group">
        <input type="number" value="1" min="1" max="100">
        <button class="add-to-cart" type="button" class="btn" data-id="{{ $dish->id }}" data-name="{{ $dish->name }}" data-price="{{ $dish->price }}">Add to Cart</button>
    </div>
</div>
@endforeach

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            window.cart = <?php echo json_encode($cart) ?>;

            updateCartButton();
            
            $('.add-to-cart').on('click', function(event){
                var cart = window.cart || [];
                cart.push({'id':$(this).data('id'), 'name':$(this).data('name'), 'price':$(this).data('price'), 'qty':$(this).prev('input').val()});
                window.cart = cart;

                $.ajax('/store/add-to-cart', {
                    type: 'POST',
                    data: {"_token": "{{ csrf_token() }}", "cart":cart},
                    succes: function (data, status, xhr){

                    }
                });
                updateCartButton();
            });
        })

        function updateCartButton(){
            var count = 0;
            window.cart.forEach(function(item, i){
                count += Number(item.qty);
            });
            $('#items-in-cart').html(count);
        }
    </script>
@endsection