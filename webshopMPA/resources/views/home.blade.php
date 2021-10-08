@include('includes.header')
@include('includes.navbar')
<div class="container-fluid text-center">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="container w-50 h-50">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ url('image/battlefield2042.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('image/deathloop.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ url('image/deadbydaylight.jpg') }}" class="d-block w-100" alt="...">
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

    @if(isset($allCategories))
        @foreach ($allCategories as $category)
            <p>{{$category->category}} </p>
        @endforeach
    @endif   

</div>
@include('includes.footer')