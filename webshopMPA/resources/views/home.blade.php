@include('includes.header')
@include('includes.navbar')
<div class="container-fluid text-center">
    <div id="carouselExampleControls" class="carousel slide w-50 h-50 carousel-margin" data-bs-ride="carousel">
        <div class="container">
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ url('image/battlefield2042.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('image/deathloop.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ url('image/deadbydaylight.jpg') }}" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-fluid categoryCardContainer">
        @if(isset($allCategories))
            @foreach ($allCategories as $category)
            <div class="card categoryCard" style="width: 16rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->category}}</h5>
                    <p class="card-text">Open page with all products in category: {{ $category->category}}.</p>
                    <a href="{{ url('/category', $category->id) }}" class="btn btn-primary">Open {{ $category->category}}</a>
                </div>
            </div>
            @endforeach
        @endif  
    </div>
</div>
@include('includes.footer')