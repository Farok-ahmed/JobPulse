<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{route('home')}}" class="logo">
            <img src="{{asset('frontend/assets/')}}/img/logo.png" alt="logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('frontend/assets/')}}/img/logo.png" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link  active">Home</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('about')}}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('job')}}" class="nav-link ">Jobs</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('blog')}}" class="nav-link ">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('contact')}}" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                    @if (!Auth::check())
                    <div class="other-option">
                        <a href="{{route('register')}}" class="signup-btn">Sign Up</a>
                        <a href="{{route('login')}}" class="signin-btn">Sign In</a>
                    </div>
                    @endif
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                        <a class="btn btn-outline-light" href="{{route('admin.dashboard')}}">Dashboard</a>
                        @elseif (Auth::user()->role == 'company')
                        <a class="btn btn-outline-light"  href="{{route('company.dashboard')}}">Dashboard</a>
                        @else
                        <a class="btn btn-outline-light"  href="{{route('dashboard')}}">Dashboard</a>
                        @endif

                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
