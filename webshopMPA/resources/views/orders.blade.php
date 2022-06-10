@include('includes.header')
@include('includes.navbar')
@foreach ($orders as $order)
    <div class="list-group w-50">
        <li class="list-group-item">
            <h1> Order: {{$order->id}}</h1>
        </li>
        @foreach ($order->products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                {{$product->name}}
                <span class="badge bg-primary rounded-pill">{{$product->pivot->ordered_amount}}</span>
            </li>
        @endforeach
        <li class="list-group-item">
            <p>Total items: {{$order->total_orded_products}}</p>
        </li>
        <li class="list-group-item">
            <p>Total price: €{{$order->total_price}}</p>
        </li>
    </div>
    <br>
@endforeach
@include('includes.footer')