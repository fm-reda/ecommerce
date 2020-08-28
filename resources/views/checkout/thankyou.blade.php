@extends('layouts.master2')
@section('content')

<div class="col-md-12 m-t-40">
    <div class="container">
        <div class="jumbotron text-center m-t-100">
            <h1 class="display-3">Thank You!</h1>
            <p class="lead"><strong>Your order has been succeeded!</strong></p>
            <hr>
            <p>
                If your have any problem? <a href="#">Contact us</a>
            </p>
            <p class="lead">
                <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}" role="button">Continuer vers la
                    boutique</a>
            </p>
        </div>
    </div>
</div>



@endsection