<div class="" style="    text-align: right;
    padding-top: 16px;
    padding-right: 38px;">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bonjour {{ Auth::user()->lastName }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('order.index') }}">
                            Les commandes
                        </a>
                        <a class="dropdown-item" href="{{ route('user.logout') }}">Se déconnecter</a>
                    </div>
                    </div>
            @else
                <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            @endauth
        </div>
       @endif
    </div>