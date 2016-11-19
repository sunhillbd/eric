 <!-- Header
    ============================================= -->
    <header id="header" class="transparent-header full-header" style= '{{isset($register)?"background: black":" "}}' data-sticky-class= "{{ isset($register)?'not-dark':'dark' }}" >

        <div id="header-wrap">


            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('index') }}" class="standard-logo"><img src="{{ asset('images/logo-dark.png') }}" alt="ESE Law Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="dark">

                    <ul>
                        <li><a href="#"><div>How It Works</div></a></li>
                        <li><a href="#"><div>Resources</div></a></li>
                        <li><a href="#"><div>Pricing</div></a></li>
                        <li><a href="#"><div>FAQ</div></a></li>
                        <li><a href="{{ route('dashboard') }}"><div>Dashboard</div></a></li>


                        @if(!is_null(auth()->user()))
                            <li><a href={{ route('auth.logout') }}>Logout</a></li>

                        @else
                            <li><a href="{{ route('register') }}">Sign-Up</a></li>
                            <li><a href={{ route('auth.login') }}>Login</a></li>
                        @endif

                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->