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
                    Menus				
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="menu.html"> Menus</a></p>
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
        @if (Session::has('cart'))
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
            {{-- {{ dd($product) }} --}}
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img style="width: 80px !important;" src="{{ asset('storage/' . $product['item']->image) }}" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{ $product['item']['name'] }}</h4>
                            <p>En promo : {{ $product['item']->in_promo ? 'Oui' : 'Non' }}</p>
                            <select multiple="true" name="supplements[]">
                                @forelse ($supplements as $supplement)
                                 <option value="{{ $supplement->id }}">
                                    {{ $supplement->name }}
                                 </option>
                                @empty
                                  <p>no supplement.</p>  
                                @endforelse
                            </select>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{ $product['item']->price }} £</td>
                <form action="{{ route('update-cart') }}" method="POST">
                    @csrf
                    @method('post')
                    <td data-th="Quantity">
                        <input type="number" name="qtyUpdate" class="form-control text-center" value="{{ $product['qty'] }}">
                    </td>
                    <input type="text" name="product_id" value="{{ $product['item']->id }}" hidden>
                    <td data-th="Subtotal" class="text-center">{{ $product['price'] }} £</td>
                    <td class="actions" data-th="">
                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                </form>
                    <a class="btn btn-danger btn-sm deleteProductFromCart" 
                    href="delete-from-cart/{{ $product['item']->id }}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>{{ $totalPrice }} £</strong></td>
            </tr>
            <tr>
                <td><a href="{{ url('/menu') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>{{ $totalPrice }} £</strong></td>
            </tr>
            </tfoot>
        </table>
        <p class="text-right">
            <a href="{{ url('/menu') }}" class="btn btn-primary">Checkout <i class="fa fa-angle-right"></i></a>
        </p>
        @else
            <h3>Votre panier est vide.</h3>
        @endif
    </div>
</section>
@endsection