{{-- ********************************************* Single product --}}

@extends('layouts.master2')
@section('content')

<div class="col-md-12">


    <div class="container bgwhite  p-b-80 ">
        <!-- breadcrumb -->
        <div class="bread-crumb bgwhite flex-w  p-r-15 m-t-30 p-l-15-sm p-b-10" style="border-bottom:1px solid #ddd">
            <a href="{{route('products.index')}}" class="m-text12">
                Shop
                <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
            </a>

            @foreach ($product->categories as $category)
            <a href="{{route('products.index',['categorie'=>$category->slug])}}" class="m-text12">
                {{$category->name}}
                @php
                $category=$category->slug
                // $categoryName=$category->name
                // $categoryName1="ee"
                @endphp



                <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
            </a>
            @endforeach

            <a href="#" class="m-text12 " style="color:#078dff!important">
                {{$product->title}}
                {{-- <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i> --}}
            </a>


        </div>
        <div class="flex-w flex-sb ">
            <div class="w-size13 p-t-30 respon5 ">
                <div class="wrap-slick3 flex-sb flex-w ">
                    <div class="wrap-slick3-dots "></div>
                    <div class="slick3 border">
                        <div class="item-slick3" data-thumb="{{asset('storage/'.$product->image)}}">
                            <div class="wrap-pic-w ">
                                <img src=" {{asset('storage/'.$product->image)}}" alt="" width="50"
                                    class=" img-thumbnail border-0 " style="height:500px">
                            </div>
                        </div>
                        {{-- style="border:1px solid #e6e6e6" --}}

                        @if ($product->images)
                        @foreach (JSON_decode($product->images,true) as $image)
                        <div class="item-slick3" data-thumb="{{asset('storage/'.$image)}}">
                            <div class="wrap-pic-w">
                                <img src="{{asset('storage/'.$image)}}" alt="" width="50" class="img-thumbnail border-0"
                                    style="height:500px">
                            </div>
                        </div>
                        @endforeach
                        @endif


                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-textr1 p-b-5">
                    {{$product->title}}
                </h4>

                <span class="m-text8">
                    {{$product->getPrice()}}

                </span>


                <div class="p-b-45">
                    <span class="s-text8 m-r-35">SKU: MUG-01</span>
                    <span class="">Categories: <span class=" ">
                            @foreach ($product->categories as $category)
                            <a href="{{route('products.index',['categorie'=>$category->slug])}}" class="m-text15"
                                style="color:#0073b1">
                                {{$category->name}}
                                {{-- <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i> --}}
                            </a>
                            @endforeach</span></span>
                </div>

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Description
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {!! html_entity_decode($product->description) !!}
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Additional information
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel
                            sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Reviews (0)
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel
                            sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>
                <div class="p-t-33 p-b-60">
                    <div class="flex-w p-t-10 w-size16 flex-m">
                        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->

                            @if($product->stock>0)
                            <form action="{{route('cart.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="title" value="{{$product->title}}">
                                <input type="hidden" name="price" value="{{$product->price}}">

                                <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Add to Cart
                                </button>
                            </form>
                            @else
                            <div class="flex-c-m size1 bg4  s-text1 trans-0-4">Out of stock</div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm  position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">
                <div class="badge badge-pill badge-info">{{$stock}}
</div>
@foreach ($product->categories as $category)
{{$category->name}}

@endforeach

</strong>
<h5 class="mb-0">{{$product->title}}</h5>

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
</div> --}}
</div>

@endsection
@section('extra-js')
{{-- <script src="js/main.js"></script> --}}

<script>
    var mainImage = document.querySelector('#mainImage');
    var thumbnails = document.querySelectorAll('.img-thumbnail');
    console.log(thumbnails)

    thumbnails.forEach((element) =>

        element.addEventListener('mouseover', changeImage));

    function changeImage(e) {
        mainImage.src = this.src;
        console.log(1);

        mainImage.classList.add('rounded');
    }
   
h1
</script>

@endsection

{{--  <div class="mb-1 text-muted">{{$product ->created_at->format('d/m/Y')}}
</div> --}}


{{-- <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product"
                                    value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div> --}}

{{-- <div class="flex-m flex-w p-b-10">
                        <div class="s-text15 w-size15 t-center">
                            Size
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="size">
                                <option>Choose an option</option>
                                <option>Size S</option>
                                <option>Size M</option>
                                <option>Size L</option>
                                <option>Size XL</option>
                            </select>
                        </div>
                    </div> --}}

{{-- <div class="flex-m flex-w">
                        <div class="s-text15 w-size15 t-center">
                            Color
                        </div>

                        <div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
                            <select class="selection-2" name="color">
                                <option>Choose an option</option>
                                <option>Gray</option>
                                <option>Red</option>
                                <option>Black</option>
                                <option>Blue</option>
                            </select>
                        </div>
                    </div> --}}