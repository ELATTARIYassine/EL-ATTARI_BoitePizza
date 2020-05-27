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
        
        <div class="row d-flex justify-content-center">
            @foreach ($sectors as $sector)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                      <strong style="font-weight: 600;">{{ $sector->name }} ({{ $sector->price }}£)</strong>
                    </div>
                    <ul class="list-group list-group-flush">
                      @foreach ($sector->areas as $area)
                      <li class="list-group-item">
                        {{ $area->name }}    
                      </li>
                      @endforeach
                    </ul>
                  </div>
            </div>
            @endforeach
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
@include('partials.footer')

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('formulaToast'))
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "2000",
            "hideDuration": "2000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
            toastr.info("{{ Session::get('formulaToast') }}")
        @endif
    </script>
@endsection 

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection