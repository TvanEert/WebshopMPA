@include('includes.header')
@include('includes.navbar')
<div class="container-fluid">
    @if(@isset($product))
        @foreach ($product as $info)
                <h1>{{$info->name}}</h1>
        @endforeach
    @endif
</div>
@include('includes.footer')