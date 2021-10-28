@include('includes.header')
@include('includes.navbar')
<div class="container-fluid productCardContainer">
    <div class=" container productCardContainer">
        @if(isset($categoryProducts))
            @foreach ($categoryProducts as $product)
                <div class="card productCard" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name}}</h5>
                        <p class="card-text">{{ $product->description}}.</p>
                        <h1>{{ $product->price}}</h1>
                        <a href="" class="btn btn-primary">Add to card</a>
                    </div>
                </div>
            @endforeach
        @endif  
    </div>
</div>
@include('includes.footer')