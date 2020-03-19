@extends('layouts.master')
@section('content')
<div class="col-md-12">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-success">Design</strong>
      <h5 class="mb-0">{{$product->title}}</h5>
      <div class="mb-1 text-muted">{{$product ->created_at->format('d/m/Y')}}</div>
      <p class="">{{$product->subtitle}}</p>
      <strong class="">{{$product->getPrice()}}</strong>
      <form action="{{route('cart.store')}}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="title" value="{{$product->title}}">
        <input type="hidden" name="price" value="{{$product->price}}">
        <button type="submit" class="btn btn-dark">Add cart <i class="fa fa-cart-plus " aria-hidden="true"></i></button>
      </form>
      
    </div>
    <div class="col-auto d-none d-lg-block">
        <img src="{{$product->image}}" alt="">
      {{--  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>  --}}
    </div>
  </div>
</div>
    
@endsection



