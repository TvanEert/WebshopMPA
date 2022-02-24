@include('includes.header')
@include('includes.navbar')
<div class="container-fluid productCardContainer">
    <div class="container">
        @foreach ($cartItems as $cartItem)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$cartItem->product->name}}</h5>
                    <img src="{{$cartItem->product->image}}" class="card-img">
                    <p> 
                        <a href="{{ url('/addToCart', $cartItem->product->id)}}" class="btn btn-success"> +1 </a> 
                        <b>qty: </b>{{$cartItem->getQty()}}
                        <a href="{{ url('/reduceProductByOne', $cartItem->product->id)}}" btn btn-danger> -1 </a>
                    </p>
                </div>
            </div>
        @endforeach
        <p>{{$totalQty}}</p>
        <p>{{$totalPrice}}</p>
    </div>
</div>
@include('includes.footer')
