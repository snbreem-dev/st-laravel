<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index"><h2>Sixteen <em>Clothing</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item homepage">
                        <a class="nav-link" href="{{route('home')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item products">
                        <a class="nav-link" href="{{route('products')}}">Our Products</a>
                    </li>
                    <li class="nav-item aboutus">
                        <a class="nav-link" href="{{route('about')}}">About Us</a>
                    </li>
                    <li class="nav-item contactus">
                        <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item contactus">
                            <a class="nav-link" href="{{route('admin.dashboard')}}">Admin</a>
                        </li>
                    @endauth

                    @auth
                        <li class="nav-item contactus">
                            <a class="nav-link" href="{{route('logout')}}">Logout</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>
