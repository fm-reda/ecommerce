{{-- ************************************************products all or by categorie  --}}

@extends('layouts.master2')
@section('content')
{{-- {{dd($categorie)}} --}}
{{-- <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
    <h2 class="l-text2 t-center">
        Women
    </h2>
    <p class="m-text13 t-center">
        New Arrivals Women Collection 2018
    </p>
</section> --}}
@php
if(request()->get('categorie')){
$categorie=request()->get('categorie');
// dd(request()->get('categorie'));
}else
$categorie='all';
@endphp





<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row ">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Categories
                    </h4>
                    <ul class="p-b-54">
                        <li class="p-t-4">
                            {{-- <a class="{{ 'all'==strtolower($categorie)) ? 'active20' : '' }}" --}}
                            <a class="{{ ($categorie=='all') ? 'active20' : '' }}"
                                href="{{route('products.index')}}">All</a>

                            {{-- 
                            <a href="{{route('products.index')}}" class="{{$categorie??''}}">All </a>
                            <div class="image{{ ($categorie==$category) ? 'active20' : '' }}"> --}}

                                {{-- @if(!$categorie)
                            <a href="{{route('products.index')}}" class="active20">All </a>
                                @else
                                <a href="{{route('products.index')}}" class="">All </a>

                                @endif --}}

                        </li>
                        @foreach (App\Category::all() as $category)
                        <li class="p-t-4">
                            {{-- <a class="{{ true ? $category : '' }}" --}}
                            <a class="{{ ($category->slug==strtolower($categorie)) ? 'active20' : '' }}"
                                href="{{route('products.index',['categorie'=>$category->slug])}}">{{$category->name}}</a>


                        </li>
                        @endforeach

                        {{-- 
                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Women
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Men
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Kids
                            </a>
                        </li>

                        <li class="p-t-4">
                            <a href="#" class="s-text13">
                                Accesories
                            </a>
                        </li> --}}
                    </ul>

                    <!--  -->
                    {{-- <h4 class="m-text14 p-b-32">
                        Filters
                    </h4>

                    <div class="filter-price p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-17">
                            Price
                        </div>

                        <div class="wra-filter-bar">
                            <div id="filter-bar"></div>
                        </div>

                        <div class="flex-sb-m flex-w p-t-16">
                            <div class="w-size11">
                                <!-- Button -->
                                <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">
                                    Filter
                                </button>
                            </div>

                            <div class="s-text3 p-t-10 p-b-10">
                                Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                            </div>
                        </div>
                    </div>

                    <div class="filter-color p-t-22 p-b-50 bo3">
                        <div class="m-text15 p-b-12">
                            Color
                        </div>

                        <ul class="flex-w">
                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter1" type="checkbox"
                                    name="color-filter1">
                                <label class="color-filter color-filter1" for="color-filter1"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter2" type="checkbox"
                                    name="color-filter2">
                                <label class="color-filter color-filter2" for="color-filter2"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter3" type="checkbox"
                                    name="color-filter3">
                                <label class="color-filter color-filter3" for="color-filter3"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter4" type="checkbox"
                                    name="color-filter4">
                                <label class="color-filter color-filter4" for="color-filter4"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter5" type="checkbox"
                                    name="color-filter5">
                                <label class="color-filter color-filter5" for="color-filter5"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter6" type="checkbox"
                                    name="color-filter6">
                                <label class="color-filter color-filter6" for="color-filter6"></label>
                            </li>

                            <li class="m-r-10">
                                <input class="checkbox-color-filter" id="color-filter7" type="checkbox"
                                    name="color-filter7">
                                <label class="color-filter color-filter7" for="color-filter7"></label>
                            </li>
                        </ul>
                    </div> --}}

                    <div class="search-product pos-relative bo4 of-hidden">
                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product"
                            placeholder="Search Products...">

                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                <!--  -->
                {{-- <div class="flex-sb-m flex-w p-b-35">
                    <div class="flex-w">
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Default Sorting</option>
                                <option>Popularity</option>
                                <option>Price: low to high</option>
                                <option>Price: high to low</option>
                            </select>
                        </div>

                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <select class="selection-2" name="sorting">
                                <option>Price</option>
                                <option>$0.00 - $50.00</option>
                                <option>$50.00 - $100.00</option>
                                <option>$100.00 - $150.00</option>
                                <option>$150.00 - $200.00</option>
                                <option>$200.00+</option>

                            </select>
                        </div>
                    </div>

                    <span class="s-text8 p-t-5 p-b-5">
                        Showing 1–12 of 16 results
                    </span>
                </div> --}}

                <!-- Product -->
                <div class="row">
                    {{-- {{count($products)}} --}}
                    @foreach ($products as $product)
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                        <!-- Block2 -->
                        <div class="block2 border">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                                <img src="{{asset('storage/'.$product->image)}}" alt="IMG-PRODUCT" style="height:267px">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->


                                        @if($product->stock>0)
                                        <form action="{{route('cart.store',['origin'=>'index'])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="title" value="{{$product->title}}">
                                            <input type="hidden" name="price" value="{{$product->price}}">
                                            {{-- <button type="submit" class="btn btn-primary mt-5">Add cart <i
                                                    class="fa fa-cart-plus " aria-hidden="true"></i></button> --}}
                                            <button type="submit"
                                                class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </form>
                                        @else
                                        <div class="flex-c-m size1 bg4  s-text1 trans-0-4">Out of stock</div>


                                        @endif

                                        {{-- <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-10 p-l-8 p-b-8">
                                <a href="{{route('products.show2', $product->slug)}}"
                                    class="block2-name dis-block s-text3 p-b-5">
                                    {{$product->title}}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    {{$product->getPrice()}}
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="mx-auto">{{$products->appends(request()->input())->links()}}
                    </div>

                </div>

                <!-- Pagination -->
                {{-- <div class="pagination flex-m flex-w p-t-26">
                    <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                    <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                </div> --}}
            </div>
        </div>
    </div>
</section>

{{-- @foreach ($products as $product)
<div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">

                @foreach ($product->categories as $category)
                {{$category->name}}

@endforeach


</strong>
<h5 class="mb-0">{{$product->title}}</h5>
<p class=" text-muted">{{$product->subtitle}}</p>
<strong class="mb-3 font-weight-normal text-secondary">{{$product->getPrice()}}</strong>
<a href="{{route('products.show', $product->slug)}}" class="stretched-link btn btn-info">Continue
    reading</a>
</div>
<div class="col-auto d-none d-lg-block p-4">
    <img src="{{asset('storage/'.$product->image)}}" width="200px" alt="">
</div>
</div>
</div>

@endforeach --}}
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>


@endsection
{{--  <div class="mb-auto text-muted">{{$product ->created_at->format('d/m/Y')}}
</div> --}}
{{--  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>  --}}