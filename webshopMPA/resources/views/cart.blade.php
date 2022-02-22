@include('includes.header')
@include('includes.navbar')
<div class="container-fluid productCardContainer">
    <div class="container">
        @foreach ($cartItems as $key => $cartItem)
                <p>{{$key}}-{{$cartItem->getQty()}}-{{$cartItem->product->name}}</p>
        @endforeach
        <p>{{$totalQty}}</p>
        <p>{{$totalPrice}}</p>
    </div>
</div>
@include('includes.footer')