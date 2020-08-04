@extends('layouts.master2')
@section('content')
{{-- {{dd($categorie)}} --}}
@foreach ($products as $product)
<div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">

                @foreach ($product->categories as $category)
                {{$category->name}}

                @endforeach


            </strong>
            <h5 class="mb-0">{{$product->title}}</h5>
            {{--  <div class="mb-auto text-muted">{{$product ->created_at->format('d/m/Y')}}
        </div> --}}
        <p class=" text-muted">{{$product->subtitle}}</p>
        <strong class="mb-3 font-weight-normal text-secondary">{{$product->getPrice()}}</strong>
        <a href="{{route('products.show', $product->slug)}}" class="stretched-link btn btn-info">Continue reading</a>
    </div>
    <div class="col-auto d-none d-lg-block p-4">
        <img src="{{asset('storage/'.$product->image)}}" width="200px" alt="">
        {{--  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>  --}}
    </div>
</div>
</div>

@endforeach
{{$products->appends(request()->input())->links()}}

@endsection