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
<section class="relative about-banner">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Blog Details Page				
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">Product </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> Product Details Page</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->					  

<!-- Start post-content Area -->
<section class="post-content-area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('storage/' . $product->image) }}" alt="">
                        </div>									
                    </div>
                    <div class="col-lg-12">
                        <div class="quotes">
                            <div class="card">
                                <div class="card-header">
                                <strong>Nom</strong> : {{ $product->name }}
                                </div>
                                <div class="card-header">
                                <strong>Prix</strong> : {{ $product->price }}£
                                </div>
                                <div class="card-header">
                                <strong>En promotion</strong> : {{ $product->in_promo ? 'Oui': 'Non' }}
                                </div>
                                @if ($product->in_promo)
                                <div class="card-header">
                                        <strong>Remise</strong> : {{ $product->discount }}%
                                </div>
                                @endif
                                @if ($product->in_promo)
                                <div class="card-header">
                                        <strong>Date de fin de promotion</strong> : {{ $product->end_date }}
                                </div>
                                @endif
                            </div>									
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    @if ($product->comments->count() != 0)
                    <h4>{{ $product->comments->count() }} Comments</h4>
                    @endif
                    @forelse ($product->comments as $comment)
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img style="width:60px;" src="{{ asset($comment->client->image) }}" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">{{ $comment->client->lastName }}</a></h5>
                                    <p class="date">{{ $comment->client->created_at->diffForHumans() }}</p>
                                    <p class="comment">
                                        {{ $comment->text }}
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                   <a href="" class="btn-reply text-uppercase">reply</a> 
                            </div>
                        </div>
                    </div>
                    @empty
                        <h4>Pas de commentaire</h4>
                    @endforelse	
                </div>
                @auth
                <div class="comment-form">
                    <h4>Leave a Comment</h4>
                    <form action="{{ route('comment') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input style="display:none;" name="product_id" type="text" value="{{ $product->id }}" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control col-lg-12 mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                        </div>
                        <button class="primary-btn text-uppercase">Post Comment</button>	
                    </form>
                </div>
                @endauth
                @guest
                    <div class="alert alert-warning">
                        veuillez vous authentifier pour commander
                    </div>
                @endguest
            </div>
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                    <div class="single-sidebar-widget search-widget">
                        <form class="search-form" action="#">
                            <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'" >
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="single-sidebar-widget user-info-widget">
                        <img src="img/blog/user-info.png" alt="">
                        <a href="#"><h4>Charlie Barber</h4></a>
                        <p>
                            Senior blog writer
                        </p>
                        <ul class="social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-github"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                        <p>
                            Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.
                        </p>
                    </div>
                    <div class="single-sidebar-widget popular-post-widget">
                        <h4 class="popular-title">Popular Posts</h4>
                        <div class="popular-post-list">
                            <div class="single-post-list d-flex flex-row align-items-center">
                                <div class="thumb">
                                    <img class="img-fluid" src="img/blog/pp1.jpg" alt="">
                                </div>
                                <div class="details">
                                    <a href="blog-single.html"><h6>Space The Final Frontier</h6></a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="single-post-list d-flex flex-row align-items-center">
                                <div class="thumb">
                                    <img class="img-fluid" src="img/blog/pp2.jpg" alt="">
                                </div>
                                <div class="details">
                                    <a href="blog-single.html"><h6>The Amazing Hubble</h6></a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="single-post-list d-flex flex-row align-items-center">
                                <div class="thumb">
                                    <img class="img-fluid" src="img/blog/pp3.jpg" alt="">
                                </div>
                                <div class="details">
                                    <a href="blog-single.html"><h6>Astronomy Or Astrology</h6></a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>
                            <div class="single-post-list d-flex flex-row align-items-center">
                                <div class="thumb">
                                    <img class="img-fluid" src="img/blog/pp4.jpg" alt="">
                                </div>
                                <div class="details">
                                    <a href="blog-single.html"><h6>Asteroids telescope</h6></a>
                                    <p>02 Hours ago</p>
                                </div>
                            </div>															
                        </div>
                    </div>
                    <div class="single-sidebar-widget ads-widget">
                        <a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
                    </div>
                    <div class="single-sidebar-widget post-category-widget">
                        <h4 class="category-title">Post Catgories</h4>
                        <ul class="cat-list">
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Technology</p>
                                    <p>37</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Lifestyle</p>
                                    <p>24</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Fashion</p>
                                    <p>59</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Art</p>
                                    <p>29</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Food</p>
                                    <p>15</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Architecture</p>
                                    <p>09</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>Adventure</p>
                                    <p>44</p>
                                </a>
                            </li>															
                        </ul>
                    </div>	
                    <div class="single-sidebar-widget newsletter-widget">
                        <h4 class="newsletter-title">Newsletter</h4>
                        <p>
                            Here, I focus on a range of items and features that we use in life without
                            giving them a second thought.
                        </p>
                        <div class="form-group d-flex flex-row">
                           <div class="col-autos">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                </div>
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" >
                              </div>
                            </div>
                            <a href="#" class="bbtns">Subcribe</a>
                        </div>	
                        <p class="text-bottom">
                            You can unsubscribe at any time
                        </p>								
                    </div>
                    <div class="single-sidebar-widget tag-cloud-widget">
                        <h4 class="tagcloud-title">Tag Clouds</h4>
                        <ul>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Art</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Adventure</a></li>
                        </ul>
                    </div>								
                </div>
            </div>
        </div>
    </div>	
</section>
<!-- End post-content Area -->

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