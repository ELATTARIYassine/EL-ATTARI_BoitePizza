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
                    <input type="hidden" value="{{ $clientSecret ?? '' }}" id="cs">
                    <div class="row" style="margin-top: 50px;
                    padding: 13px;">
                        <div class="col-md-6 offset-md-3">
                            <form action="/charge" method="post" id="payment-form">
                                @csrf
                                    <div class="">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                    
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                    
                                    <button class="btn btn-primary mt-3">Submit Payment</button>
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
     window.onload = function() {
            var stripe = Stripe('pk_test_SzTr23XpFCN1XYGCIGMi1iVk00w5DAvuje');
            var elements = stripe.elements();
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            var card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
        }
</script>
@endsection

@section('style')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
<script src="https://js.stripe.com/v3/"></script>
@endsection