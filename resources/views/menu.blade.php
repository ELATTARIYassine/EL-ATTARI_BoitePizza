@extends('layouts.main')

@section('main-content')
<header id="header">
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

        <ul class="filter-wrap filters col-lg-12 no-padding">
            <li class="active" data-filter="*">All Menu</li>
            <li data-filter=".pizza">Pizza</li>
            <li data-filter=".salades">Salades</li>
            <li data-filter=".boissons">Boissons</li>
        </ul>
        
        <div class="filters-content">
            <div class="row grid">
                @forelse ($pizzas as $pizza)
                <div class="col-md-6 all pizza">
                    <div class="single-menu">
                        <div class="title-wrap d-flex justify-content-between">
                            <h4><a href="{{ route('sp', ['product' => $pizza->id]) }}">{{ $pizza->name }}</a></h4>
                            <h4 class="price">{{ $pizza->price }}£</h4>
                            @if ($pizza->in_promo)
                            <del>
                                <h4 class="price">{{ $pizza->price + $pizza->price * $pizza->discount / 100 }}£</h4>
                            </del>
                            <span class="badge badge-default">Remise {{ $pizza->discount }}%</span>
                            @endif
                        </div>			
                        <div class="d-flex justify-content-between">
                            <img class="productImageInMenu" src="{{ asset('storage/' . $pizza->image) }}" alt="">
                            @auth
                            <button class="btn btn-light btn-sm commandButtonForProduct">Commander</button>
                            @endauth
                            @guest
                            <div class="alert alert-warning alertForGuest">veuillez vous authentifier pour commander</div>
                            @endguest
                        </div>
                    </div>					                               
                </div> 
                @empty
                    <h2>il n'y a pas de pizza maintenant )':</h2>
                @endforelse

                @forelse ($salades as $salade)
                <div class="col-md-6 all salades">
                    <div class="single-menu">
                        <div class="title-wrap d-flex justify-content-between">
                            <h4>{{ $salade->name }}</h4>
                            <h4 class="price">{{ $salade->price }}£</h4>
                            @if ($salade->in_promo)
                            <del>
                                <h4 class="price">{{ $salade->price + $salade->price * $salade->discount / 100 }}£</h4>
                            </del>
                            <span class="badge badge-default">Remise {{ $salade->discount }}%</span>
                            @endif
                        </div>			
                        <div class="d-flex justify-content-between">
                            <img class="productImageInMenu" src="{{ asset('storage/' . $salade->image) }}" alt="">
                            @auth
                            <button class="btn btn-light btn-sm commandButtonForProduct">Commander</button>
                            @endauth
                            @guest
                            <div class="alert alert-warning alertForGuest">veuillez vous authentifier pour commander</div>
                            @endguest
                        </div>
                    </div>					                               
                </div> 
                @empty
                    <h2>il n'y a pas de salade maintenant )':</h2>
                @endforelse 
                
                @forelse ($boissons as $boisson)
                <div class="col-md-6 all boissons">
                    <div class="single-menu">
                        <div class="title-wrap d-flex justify-content-between">
                            <h4>{{ $boisson->name }}</h4>
                            <h4 class="price">{{ $boisson->price }}£</h4>
                            @if ($boisson->in_promo)
                            <del>
                                <h4 class="price">{{ $boisson->price + $boisson->price * $boisson->discount / 100 }}£</h4>
                            </del>
                            <span class="badge badge-default">Remise {{ $boisson->discount }}%</span>
                            @endif
                        </div>			
                        <div class="d-flex justify-content-between">
                            <img class="productImageInMenu" src="{{ asset('storage/' . $boisson->image) }}" alt="">
                            @auth
                            <button class="btn btn-light btn-sm commandButtonForProduct">Commander</button>
                            @endauth
                            @guest
                            <div class="alert alert-warning alertForGuest">veuillez vous authentifier pour commander</div>
                            @endguest
                        </div>
                    </div>					                               
                </div> 
                @empty
                <div class="col-md-6 all boissons">
                    <div class="single-menu alert alert-danger">
                        <div class="title-wrap d-flex justify-content-between">
                            <h3>Aucune boisson trouvée maintenant.</h3>
                        </div>			
                    </div>					                               
                </div> 
                @endforelse 
            </div>
        </div>
        
    </div>
</section>
<!-- End menu-area Area -->						

<!-- Start reservation Area -->
<section class="reservation-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 reservation-left">
                <h1 class="text-white">Reserve Your Seats
                to Confirm if You Come
                with Your Family</h1>
                <p class="text-white pt-20">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.
                </p>
            </div>
            <div class="col-lg-5 reservation-right">
                <form class="form-wrap text-center" action="#">
                    <input type="text" class="form-control" name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'" >
                    <input type="email" class="form-control" name="email" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'" >
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" >		
                    <input type="text" class="form-control date-picker" name="date" placeholder="Select Date & time" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Date & time'" >									
                    <div class="form-select" id="service-select">
                        <select>
                            <option data-display="">Select Event</option>
                            <option value="1">Event One</option>
                            <option value="2">Event Two</option>
                            <option value="3">Event Three</option>
                            <option value="4">Event Four</option>
                        </select>
                    </div>									
                    <button class="primary-btn text-uppercase mt-20">Make Reservation</button>
                </form>
            </div>
        </div>
    </div>	
</section>
<!-- End reservation Area -->				

<!-- start footer Area -->		
<footer class="footer-area">
    <div class="footer-widget-wrap">
        <div class="container">
            <div class="row section-gap">
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Opening Hours</h4>
                        <ul class="hr-list">
                            <li class="d-flex justify-content-between">
                                <span>Monday - Friday</span> <span>08.00 am - 10.00 pm</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Saturday</span> <span>08.00 am - 10.00 pm</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Sunday</span> <span>08.00 am - 10.00 pm</span>
                            </li>																				
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Contact Us</h4>
                        <p>
                            56/8, los angeles, rochy beach, Santa monica, United states of america - 1205
                        </p>
                        <p class="number">
                            012-6532-568-9746 <br>
                            012-6532-569-9748
                        </p>
                    </div>
                </div>						
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h4>Newsletter</h4>
                        <p>You can trust us. we only send promo offers, not a single spam.</p>
                        <div class="d-flex flex-row" id="mc_embed_signup">


                                <form class="navbar-form" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                                <div class="input-group add-on align-items-center d-flex">
                                        <input class="form-control" name="EMAIL" placeholder="Your Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email address'" required="" type="email">
                                    <div style="position: absolute; left: -5000px;">
                                        <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                    </div>
                                    <div class="input-group-btn">
                                    <button class="genric-btn"><span class="lnr lnr-arrow-right"></span></button>
                                    </div>
                                </div>
                                    <div class="info mt-20"></div>
                                </form>
                        </div>
                    </div>
                </div>						
            </div>					
        </div>					
    </div>
    <div class="footer-bottom-wrap">
        <div class="container">
            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-mdcol-sm-6 -6 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <ul class="col-lg-4 col-mdcol-sm-6 -6 social-icons text-right">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>           
                </ul>
            </div>						
        </div>
    </div>
</footer>
@endsection