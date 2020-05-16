@extends('layouts.main')

@section('main-content')
<header id="header">
    @include('partials.authenticatedUser')
    <div class="header-top">
        <div class="container">
                <div class="row justify-content-center">
                    <div id="logo">
                    <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
                    </div>
                </div>			  					
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-center d-flex">			
            @include('partials.navbar')	  
        </div>
    </div>
</header><!-- #header -->

<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Checkout				
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.html"> Checkout</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->			

<!-- Start menu-area Area -->
<section class="menu-area section-gap" id="menu">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-12">
                <div class="title text-center">
                    <h1 class="mb-10">What kind of Foods we serve for you</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                    <hr>
                    <input type="hidden" value="{{ $clientSecret }}" id="cs">
                    <div class="row" style="margin-top: 50px;
                    padding: 13px;">
                        <div class="col-md-6 offset-md-3">
                            <form id="payment-form" action="{{ route('cart.charge') }}" method="post">
                                @csrf
                                <div id="card-element">
                                  <!-- Elements will create input elements here -->
                                </div>
                              
                                <!-- We'll put the error messages in this element -->
                                <div id="card-errors" role="alert"></div>
                              
                                <button class="btn btn-primary mt-3" id="submit">Pay</button>
                              </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            @foreach( Session::get('cart')->items as $product)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $product['item']->name }}
                                            </h5>
                                            <div class="card-text">
                                                ${{ $product['price'] }} (Quantité {{ $product['qty']}})
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                            @if ($supplements != null)
                                <div class="card mb-2">
                                    <div class="card-body">
                                       @foreach ($supplementsNames as $name)
                                        <h5 class="card-title">
                                            {{ $name  }}
                                        </h5>
                                       @endforeach
                                        <div class="card-text">
                                            {{ $supplements}}£
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <p>
                                <strong>Total : {{$totalPrice}}£</strong>
                                @if ($matchedFormula)
                                <span class="badge badge-success">{{ $matchedFormula }}</span>
                                @endif 
                            </p>
                       </div>
                        <div class="col-md-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h3 class="card-title text-white">
                                        Your Cart
                                        <hr>    
                                    </h3>
                                    <div class="card-text">
                                        <p>
                                        Total Amount is ${{$totalPrice}}
                                        </p>
                                        <p>
                                        Total Quantities is {{ Session::get('cart')->totalQty }}
                                        </p>
                                        @if ($supplements)
                                        <p>
                                            Supplement : {{ $supplements }}£
                                        </p>
                                        @endif
                                        <a href="#" class="btn btn-info">Chekout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

@section('script')
<script>
    var stripe = Stripe('pk_test_SzTr23XpFCN1XYGCIGMi1iVk00w5DAvuje');
    var elements = stripe.elements();
    var clientSecret = document.getElementById('cs').value;
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
    window.onload = function(){
        var card = elements.create("card", { style: style });
        card.mount("#card-element");
        card.addEventListener('change', ({error}) => {
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = '';
            }
        });
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(ev) {
            // ev.preventDefault();
            stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                card: card,
                billing_details: {
                    name: 'Jenny Rosen'
                }
                }
            }).then(function(result) {
                if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
                } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                }
                }
            });
        });
    }
    
</script>
@endsection

@section('style')
<script src="https://js.stripe.com/v3/"></script>
@endsection