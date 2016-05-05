<header class="main-header">
    <a href="{{ route('index-admin') }}" class="logo">
            <span class="logo-mini">
                <img src="{{ env('VARIABLE_LOGO_MINI') }}" alt="logo">
            </span>
            <span class="logo-lg">
                <img src="{{ env('VARIABLE_LOGO_FULL') }}" alt="logo">
            </span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-power-off"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
