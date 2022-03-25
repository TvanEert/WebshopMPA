@include('includes.header')
@include('includes.navbar')
<div class="container-fluid productCardContainer">
    <div class="container d-flex flex-row">
        @foreach ($cartItems as $cartItem)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$cartItem->product->name}}</h5>
                    <img src="{{$cartItem->product->image}}" class="card-img">
                    <p> 
                        <a href="{{ url('/addToCart', $cartItem->product->id)}}" class="btn btn-success"> +1 </a> 
                        <b>qty: </b>{{$cartItem->getQty()}}
                        <a href="{{ url('/reduceProductByOne', $cartItem->product->id)}}" class="btn btn-danger"> -1 </a>
                        <a href="{{ url('/removeFromCart', $cartItem->product->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container mt-5">
        <p><b> Total Products: </b>{{$totalQty}}</p>
        <p><b> Total Price: </b>{{$totalPrice}}</p>
        <br>
        @auth
            <a href="{{ url('/')}}" class="btn btn-primary">Check out</a>
        @endauth    
    </div>
</div>
@include('includes.footer')
