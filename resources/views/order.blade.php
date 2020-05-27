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
                    Orders				
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.html"> Orders</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->			

<!-- Start menu-area Area -->
<section class="menu-area section-gap" id="menu">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">What kind of Foods we serve for you</h1>
                    <p>Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <hr>
        @foreach($carts as $cart)
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="card mb-3">
                    <div class="card-body">
                        
                        <table class="table table-bordered table-dark mt-2 mb-2 ordersTable">
                            <thead>
                                <tr>
                                    <th scope="col">Nom du produit</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Date d'achat</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cart->items as $item)
                            <tr>
                                <td>{{$item['item']['name'] }}</td>
                                <td>£{{$item['price'] }}</td>
                                <td>{{$item['qty'] }}</td>
                                @if ($loop->first)
                                <td rowspan="{{ count($cart->items) }}" class="rowSpan">{{ $cart->purchaseDate->diffForHumans() }}</td>
                                @endif
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                {{-- {{dd($cart)}} --}}
                @if (!is_numeric($cart->sector) and isset($cart->sector))
                <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$cart->totalPrice + $cart->supplementsPrice + $cart->sector->price}} | secteur : {{ $cart->sector->name }} ({{ $cart->sector->price ?? 'default' }}£)</p>
                @else
                <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$cart->totalPrice + $cart->supplementsPrice}} | secteur : {{ $cart->sector->price ?? 'default' }}</p>
                @endif
            </div>
            <div class="col-md-2">
                <ul class="list-group">
                    @if ($cart->supplementsNames != null)
                    @foreach ($cart->supplementsNames as $supplement)
                    <li class="list-group-item">{{$supplement}}</li>
                    @endforeach
                    <li class="list-group-item active text-center" style="font-size: 2rem">
                        {{$cart->supplementsPrice}}£
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        @endforeach
        <hr>
        @if (count($carts) == 0)
        <div class="row">
            <h3>No orders found.</h3>
        </div>
        @endif
    </div>
</section>
<!-- start footer Area -->		
@include('partials.footer')
@endsection