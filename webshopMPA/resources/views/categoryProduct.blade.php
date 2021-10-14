@include('includes.header')
@include('includes.navbar')
<div>
    @if(isset($categoryProducts))
        @foreach ($categoryProducts as $product)
            {{$product}}
        @endforeach
    @endif
</div>
@include('includes.footer')