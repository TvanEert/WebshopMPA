@include('includes.header')
@include('includes.navbar')
<div class="container-fluid">
    @if(@isset($product))
        @foreach ($product as $info)
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $info->name}}</h3>
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 vh-10 vw-10">
                            <div class="white-box text-center"><img src="{{ $info->image }}" class="img-fluid"></div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <h4 class="box-title mt-5">Product description</h4>
                            <p>{{ $info->description }}</p>
                            <h2 class="mt-5">${{ $info->price }}</h2>
                            <button class="btn btn-primary btn-rounded">Add to cart</button>
                            <h3 class="box-title mt-5">Categories</h3>
                            <ul class="list-group list-group-flush">
                                @foreach ($categories as $category)
                                    <li class="list-group-item">{{ $category->category }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
@include('includes.footer')