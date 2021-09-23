@include('includes.header')
    @include('includes.navbar')
    @foreach ($allCategories as $category)
        <p>{{$category->category}} </p>
    @endforeach
@include('includes.footer')