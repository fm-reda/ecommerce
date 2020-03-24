@extends('layouts.master')
@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('extra-script')

<script src="https://js.stripe.com/v3/"></script>

@endsection
@section('content')
<div class="col-md-12">
    <h1>page de paiement</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('checkout.store')}}" method="POST" id="payment-form" class="my-4">
                @csrf
                <div id="card-element" class="mb-2">
                    <input type="text" name="test">
                    {{-- <!-- Elements will create input elements here --> --}}
                </div>

                {{-- <!-- We'll put the error messages in this element --> --}}
                <div id="card-errors" role="alert"></div>

                <button class="btn btn-success mt-4" id="submit">Pay ({{getPrice(Cart::total())}})</button>
            </form>
        </div>
    </div>

</div>

@endsection

@section('extra-js')
<script>
    var stripe = Stripe('pk_test_YFkLjdVT6S7rK1oPMfqWLhLu00wnGr484l');
    var elements = stripe.elements();
    var style = {
        base: {
            color: "#32325d",
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };
    var card = elements.create("card", {
        style: style
    });
    card.mount("#card-element");
    card.addEventListener('change', ({
        error
    }) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.classList.add('alert', 'alert-warning');
            displayError.textContent = error.message;
        } else {
            displayError.classList.remove('alert', 'alert-warning');
            displayError.textContent = '';
        }
    });


    var submitButton = document.getElementById('submit');
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (ev) {
        ev.preventDefault();
        //disable button after submit
        submitButton.disabled = true;
        stripe.confirmCardPayment("{{$clientSecret}}", {
            payment_method: {
                card: card,

            }
        }).then(function (result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)

                submitButton.disabled = false;

                console.log(result.error.message);
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {

                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.

                    var paymentIntent = result.paymentIntent;
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');
                    var form = document.getElementById('payment-form');
                    var url = form.action;


                    fetch(
                        url, {
                            headers: {
                                "content-Type": "application/json",
                                "accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },

                            method: 'POST',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent

                            })
                        }
                    ).then((data) => {
                        if (data.status === 400) {
                            var redirect = '/boutique';
                        } else {
                            var redirect = '/merci';
                        }

                        window.location.href = redirect;


                    }).catch((error) => {
                        console.log(error)

                    })

                    //console.log(result.paymentIntent);
                }
            }

        });

    });

</script>

@endsection
