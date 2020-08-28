@extends('layouts.master2')
@section('content')





<div class="col-md-12 p-0">
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(images/master-slide-05.jpg);">
                    <div class="tp wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                            data-appear="fadeInDown">
                            Accessory collection 2020
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="fadeInUp">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="{{route('products.index')}}"
                                class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1" style="background-image: url(images/master-slide-04.jpg);">
                    <div class="tp wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                            data-appear="rollIn">
                            Phone
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="lightSpeedIn">
                            Discount 20%
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="{{route('products.index')}}"
                                class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1" style="background-image: url(images/master-slide-09.jpg);">
                    <div class="tp wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                            data-appear="rotateInDownLeft">
                           Pc portale/Pc gaming
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="rotateInUpRight">
                            New arrivals
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="{{route('products.index')}}"
                                class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="container">
        {{-- *************************************************************** Categories  --}}
        <section class="banner bgwhite p-t-40 p-b-40">
            <div class="container">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5 t-center">
                        Categories
                    </h3>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30 shadow-lg border">
                            <img src="{{asset('images/laptop.png')}}" alt="IMG-BENNER">
                            {{-- {{asset('images/portable.jpg')}} --}}

                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->

                                <a href="{{route('products.index',['categorie'=>'laptop'])}}"
                                    class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Laptop
                                </a>
                            </div>
                        </div>

                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30  border">
                            {{-- <img src="images/banner-05.jpg" alt="IMG-BENNER"> --}}
                            <img src="{{asset('images/accessoire.png')}}" alt="IMG-BENNER">

                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->
                                <a href="{{route('products.index',['categorie'=>'accessory'])}}"
                                    class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Accessory
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30  border">
                            {{-- <img src="images/banner-03.jpg" alt="IMG-BENNER"> --}}
                            <img src="{{asset('images/gaming.jpg')}}" alt="IMG-BENNER">


                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->
                                <a href="{{route('products.index',['categorie'=>'pc-gaming'])}}"
                                    class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Pc gaming
                                </a>

                            </div>
                        </div>

                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30  border">
                            {{-- <img src="images/banner-07.jpg" alt="IMG-BENNER"> --}}
                            <img src="{{asset('images/mobile.jpg')}}" alt="IMG-BENNER">


                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->
                                <a href="{{route('products.index',['categorie'=>'mobile-ipad'])}}"
                                    class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    Mobile/Ipad
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                        <!-- block1 -->
                        <div class="block1 hov-img-zoom pos-relative m-b-30  border">
                            {{-- <img src="images/banner-04.jpg" alt="IMG-BENNER"> --}}
                            <img src="{{asset('images/tv.png')}}" alt="IMG-BENNER">


                            <div class="block1-wrapbtn w-size2">
                                <!-- Button -->
                                <a href="{{route('products.index',['categorie'=>'tv'])}}"
                                    class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    TV
                                </a>
                                {{-- <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                    TV
                                </a> --}}
                            </div>
                        </div>

                        <!-- block2 -->
                        <div class="block2 wrap-pic-w pos-relative m-b-30 border">
                            <img src="images/icons/bg-01.jpg" alt="IMG">

                            <div class="block2-content sizefull ab-t-l flex-col-c-m">
                                <h4 class="m-text4 t-center w-size3 p-b-8">
                                    Sign up & get 20% off
                                </h4>

                                <p class="t-center w-size4">
                                    Be the frist to know about the latest fashion news and get exclu-sive offers
                                </p>

                                <div class="w-size2 p-t-25">
                                    <!-- Button -->
                                    <a href="{{route('login')}}"
                                        class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                        Sign Up
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- *************************************************************** New product  --}}

        <section class="newproduct bgwhite p-t-45 p-b-105">
            <div class="container">
                <div class="sec-title p-b-60">
                    <h3 class="m-text5 t-center">
                        Featured Products
                    </h3>
                </div>

                <!-- Slide2 -->
                <div class="wrap-slick2">
                    <div class="slick2">
                        @foreach (App\Product::Latest()->take(6)->get() as $product)
                        <div class="item-slick2 p-l-15 p-r-15 ">
                            <!-- Block2 -->
                            <div class="block2 border shadow">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew bg-light">
                                    {{-- <img src="images/item-02.jpg" alt="IMG-PRODUCT"> --}}
                                    <img src="{{asset('storage/'.$product->image)}}" width="200px" alt=""
                                        style="height:267px">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            @if($product->stock>0)
                                            <form action="{{route('cart.store',['origin'=>'home'])}}" method="post">
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
                                        </div>
                                    </div>
                                </div>
                                {{-- <hr /> --}}
                                <div class="block2-txt p-t-20 px-2 pb-3">
                                    <a href="{{route('products.show2', $product->slug)}}" style="font-size: 20px" class="text-primary block2-name dis-block
                                    s-text3 p-b-5">
                                        {{$product->title}}
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        {{$product->getPrice()}}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @endforeach

                        {{-- <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img src="images/item-02.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Herschel supply co 25l
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $75.00
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="images/item-03.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Denim jacket blue
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $92.50
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="images/item-05.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Coach slim easton black
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $165.90
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                                    <img src="images/item-07.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Frayed denim shorts
                                    </a>

                                    <span class="block2-oldprice m-text7 p-r-5">
                                        $29.50
                                    </span>

                                    <span class="block2-newprice m-text8 p-r-5">
                                        $15.90
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                    <img src="images/item-02.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Herschel supply co 25l
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $75.00
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="images/item-03.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Denim jacket blue
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $92.50
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <img src="images/item-05.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Coach slim easton black
                                    </a>

                                    <span class="block2-price m-text6 p-r-5">
                                        $165.90
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale">
                                    <img src="images/item-07.jpg" alt="IMG-PRODUCT">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                        Frayed denim shorts
                                    </a>

                                    <span class="block2-oldprice m-text7 p-r-5">
                                        $29.50
                                    </span>

                                    <span class="block2-newprice m-text8 p-r-5">
                                        $15.90
                                    </span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- Shipping -->
        <section class="shipping bgwhite p-t-62 p-b-46">
            <div class="flex-w p-l-15 p-r-15">
                <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                    <h4 class="m-text12 t-center">
                        Free Delivery Worldwide
                    </h4>

                    <a href="#" class="s-text11 t-center">
                        Click here for more info
                    </a>
                </div>

                <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                    <h4 class="m-text12 t-center">
                        30 Days Return
                    </h4>

                    <span class="s-text11 t-center">
                        Simply return it within 30 days for an exchange.
                    </span>
                </div>

                <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                    <h4 class="m-text12 t-center">
                        Store Opening
                    </h4>

                    <span class="s-text11 t-center">
                        Shop open from Monday to Sunday
                    </span>
                </div>
            </div>
        </section>



    </div>




    @endsection