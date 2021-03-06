@extends('layouts.master2')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('content')
<div class="container">


    @if (Cart::count()>0)
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-5 bg-white rounded shadow-sm mb-5 justify-content-around">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Product</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Price</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quantity</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Remove</div>
                                        </th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach (Cart::content() as $product)
                                    <tr>

                                        <th scope="row" class="border-0">
                                            <div class="p-2">

                                                {{--  src="{{asset('storage/'.$product->model->image)}}" --}}
                                                <img src="{{asset('storage/'.$product->model->image)}}" alt=""
                                                    width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#"
                                                            class="text-dark d-inline-block align-middle">{{$product->model->title}}</a>
                                                    </h5><span
                                                        class="text-muted font-weight-normal font-italic d-block">Category:
                                                        Watches</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle">
                                            <strong>{{getPrice($product->subtotal())}}</strong></td>
                                        <td class="border-0 align-middle">


                                            <select class="custom-select" data-id="{{$product->rowId}}"
                                                data-stock="{{$product->model->stock}}" name="qty" id="qty">

                                                @for ($i = 1; $i <= 6; $i++) <option value="{{$i}}"
                                                    {{ $i==$product->qty?'selected':''}}>{{$i}}</option>
                                                    @endfor
                                            </select>

                                        </td>
                                        <td class="border-0 align-middle">
                                            <form action="{{route('cart.destroy',['rowId'=>$product->rowId])}}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class=" btn btn-danger text-dark"><i
                                                        class="fa fa-trash text-white"></i></button>


                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>


                <div class="row py-5 p-4 bg-white rounded shadow-sm">




                    <div class="col-md-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                        @if (!request()->session()->has('coupon'))
                        <div class="p-4">
                            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>

                            <form action="{{route('cart.store.coupon')}}" method="POST" class="d-flex">
                                @csrf
                                <div class="input-group mb-4 border rounded-pill p-2">

                                    <input type="text" name="code" placeholder="Apply coupon"
                                        aria-describedby="button-addon3" class="form-control border-0">
                                    <div class="input-group-append border-0">
                                        <button id="button-addon3" type="submit"
                                            class="btn btn-success px-4 rounded-pill"><i
                                                class="fa fa-gift mr-2"></i>Apply
                                            coupon
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        @else
                        <div class="p-4">
                            <p class="font-italic mb-4">Un coupon est deja appliqué</p>
                            <div class="flex-sb-m">

                                {{-- mark --}}

                                <p class="text-uppercase text-success">
                                    {{-- {{request()->session('coupon')->get('coupon')['percent']}} --}}
                                    @if(request()->session('coupon')->get('coupon')['code'])
                                    {{ (request()->session('coupon')->get('coupon')['code'])}}

                                    @endif
                                    <span>{{App\Coupon::where('code',request()->session('coupon')->get('coupon')['code'])->first()->percent_off}}%</span>
                                </p>
                                <span>
                                    <form action="{{route('cart.destroy.coupon')}}" method="post"
                                        class=" d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn btn-sm btn-outline-danger "><i
                                                class="fa fa-trash"></i></button>

                                    </form>
                                </span>
                            </div>
                        </div>


                        @endif


                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions
                            for seller
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">If you have some information for the seller you can leave
                                them in
                                the box below</p>
                            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                            Order summary
                        </div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Shipping and additional costs are calculated based on values
                                you
                                have entered.
                            </p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom">
                                    <strong class="text-muted">Order Subtotal</strong>
                                    <strong>{{getPrice(Cart::subtotal())}}</strong>
                                </li>


                                {{--  cas avec coupon  ------------------------------------------------}}
                                @if (request()->session()->has('coupon'))
                                <li class="d-flex justify-content-between py-3 border-bottom">

                                    <strong class="text-muted">Coupon:
                                        ({{request()->session('coupon')->get('coupon')['code']}})
                                        {{-- 
                                        <form action="{{route('cart.destroy.coupon')}}" method="post"
                                        class=" d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn btn-sm btn-outline-danger "><i
                                                class="fa fa-trash"></i></button>

                                        </form> --}}
                                    </strong>

                                    <strong>
                                        {{getPrice(request()->session('coupon')->get('coupon')['remise'])}}

                                    </strong>
                                </li>
                                <li class="d-flex justify-content-between py-3 border-bottom">
                                    <strong class="text-muted">Nouveau sous-total</strong>
                                    <strong>{{getPrice(Cart::subtotal()-request()->session()->get('coupon')['remise'])}}</strong>
                                </li>
                                <li class="d-flex justify-content-between py-3 border-bottom">
                                    <strong class="text-muted">Taxe</strong>
                                    {{--  calcul la taxe à partir de soustotal  --}}
                                    <strong>{{getPrice((Cart::subtotal()-request()->session()->get('coupon')['remise']) * config('cart.tax')/100)}}</strong>
                                </li>
                                <li class="d-flex justify-content-between py-3 border-bottom">
                                    <strong class="text-muted">Total</strong>
                                    {{--  calcul total avec coupon ->> total-soustotal+taxe  --}}
                                    <strong>{{getPrice((Cart::subtotal()-request()->session()->get('coupon')['remise']) * (config('cart.tax')/100)
                                    +  (Cart::subtotal()-request()->session()->get('coupon')['remise']))}}</strong>
                                </li>

                                {{--  cas pas de coupon ------------------------------------------- --}}
                                @else
                                <li class="d-flex justify-content-between py-3 border-bottom">
                                    <strong class="text-muted">Tax</strong>
                                    <strong>{{getPrice(Cart::tax())}}</strong>
                                </li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Total</strong>
                                    <h4 class="font-weight-bold">{{getPrice(Cart::total())}}</h4>
                                </li>
                                @endif
                            </ul><a href="{{route('checkout.index')}}"
                                class="btn btn-dark rounded-pill py-2 btn-block">Procceed
                                to checkout</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @else
    <div class="col-md-12 m-t-40">
        <h5>Cart empty for this moment </h5>
        <p> But u can visit shop the <a class="m-2 m-text20 text-primary" href="{{route('products.index')}}">shop</a>
            for
            shopping. </p>
    </div>

    @endif


    @endsection

    @section('extra-js')
    <script>
        var selects = document.querySelectorAll('#qty')
        Array.from(selects).forEach((element) => {
            
            element.addEventListener('change', function () {
                var rowId = this.getAttribute('data-id');
                var stock = this.getAttribute('data-stock');
                var token = document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content');
                    console.log(rowId)

            fetch(

                `/panier/${rowId}`, {
                    headers: {
                        "content-Type": "application/json",
                        "accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value,
                        stock: stock


                    })
                }

            ).then((data) => {
                console.log(data);
                location.reload();

            }).catch((error) => {
                console.log(error)
            })


        });
    });

    </script>

</div>
@endsection