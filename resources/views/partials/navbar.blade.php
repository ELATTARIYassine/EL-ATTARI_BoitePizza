<nav id="nav-menu-container">
    <ul class="nav-menu">
      <li><a href="{{ route('welcome') }}">Home</a></li>
      {{-- <li><a href="about.html">About</a></li> --}}
      <li><a href="{{ route('menu') }}">Menu</a></li>
      {{-- <li><a href="gallery.html">Gallery</a></li>
      <li class="menu-has-children"><a href="">Blog</a>
        <ul>
          <li><a href="blog-home.html">Blog Home</a></li>
          <li><a href="blog-single.html">Blog Single</a></li>
        </ul>
      </li>	
      <li class="menu-has-children"><a href="">Pages</a>
        <ul>
              <li><a href="elements.html">Elements</a></li>
              <li class="menu-has-children"><a href="">Level 2 </a>
                <ul>
                  <li><a href="#">Item One</a></li>
                  <li><a href="#">Item Two</a></li>
                </ul>
              </li>					                		
        </ul>
      </li>					          					          		          
      <li><a href="contact.html">Contact</a></li> --}}
      <li><a href="{{ route('cart-view') }}"><i class="fa fa-shopping-cart"></i> Shopping Cart</a> 
        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty: '' }}</span></li>
    </ul>
</nav>