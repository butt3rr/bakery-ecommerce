<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span>
                SedapBakes <i class="motto-class">Where Gluten-Free Bakeries Come To Life</i>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">
                        Home 
                        @if(Request::is('/')) 
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('shop') }}">
                        Shop
                        @if(Request::is('shop')) 
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item {{ Request::is('why') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('why') }}">
                        Why Us
                        @if(Request::is('why')) 
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item {{ Request::is('feedback') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('feedback') }}">
                        Feedback
                        @if(Request::is('feedback')) 
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('contact') }}">
                        Contact Us
                        @if(Request::is('contact')) 
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
            </ul>
            <div class="user_option">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('myorders') }}">MY ORDERS</a>
                        <a href="{{ url('mycart') }}">
                            <i class="fa fa-shopping-bag" aria-hidden="true"> [{{$count}}] </i>
                        </a>
                        <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="Log Out" class="btn btn-success">
                        </form>
                    @else
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Login</span>
                        </a>
                        <a href="{{ url('/register') }}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>Register</span>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
