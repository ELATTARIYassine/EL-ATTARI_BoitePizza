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
                    Here where paiement will live
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
                                        <a href="{{ route('cart.checkoutAmount', $totalPrice) }}" class="btn btn-info">Chekout</a>
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

</script>
@endsection
@section('style')
<script>

</script>
@endsection