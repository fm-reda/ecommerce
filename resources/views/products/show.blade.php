@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm  position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">
                <div class="badge badge-pill badge-info">{{$stock}}</div>
                @foreach ($product->categories as $category)
                {{$category->name}}

                @endforeach

            </strong>
            <h5 class="mb-0">{{$product->title}}</h5>
            {{--  <div class="mb-1 text-muted">{{$product ->created_at->format('d/m/Y')}}
        </div> --}}
        <p class="mb-0 mt-3 text-muted">{!!$product->description !!}</p>
        <strong class="">{{$product->getPrice()}}</strong>
        @if($stock==="Disponible")
        <form action="{{route('cart.store')}}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <input type="hidden" name="title" value="{{$product->title}}">
            <input type="hidden" name="price" value="{{$product->price}}">
            <button type="submit" class="btn btn-primary mt-5">Add cart <i class="fa fa-cart-plus "
                    aria-hidden="true"></i></button>
        </form>

        @endif
    </div>
    <div class="col-auto d-none d-lg-block p-5">
        <img src="{{asset('storage/'.$product->image)}}" id="mainImage" alt="" height="300" width="260">
        <div class="mt-2">
            @if ($product->images)
            <img src="{{asset('storage/'.$product->image)}}" alt="" class="img-thumbnail" width="50">
            @foreach (JSON_decode($product->images,true) as $image)
            <img src="{{asset('storage/'.$image)}}" alt="" width="50" class="img-thumbnail">

            @endforeach

            @endif
        </div>
    </div>
</div>
</div>

@endsection
@section('extra-js')
<script>
    var mainImage = document.querySelector('#mainImage');
    var thumbnails = document.querySelectorAll('.img-thumbnail');

    thumbnails.forEach((element) =>

        element.addEventListener('mouseover', changeImage));

    function changeImage(e) {
        mainImage.src = this.src;

        mainImage.classList.add('rounded');
    }

</script>

@endsection
