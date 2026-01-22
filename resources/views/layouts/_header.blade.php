<nav class="main-header navbar navbar-expand navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('dashboard/admin_list') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        @if (Auth::user()->role == 1)

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{ url('admin/account/password') }}" class="dropdown-item">

                        <div class="media">

                            @if (!empty(Auth::user()->image))
                                @if (file_exists('storage/' . Auth::user()->image))
                                    <img src="{{ url('storage/' . Auth::user()->image) /* asset('dist/img/user1-128x128.jpg') */ }}"
                                        alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                @endif
                            @endif


                            <div class="media-body">

                                <h3 class="dropdown-item-title">
                                    Account
                                    <span class="float-right text-sm text-primary"><i class="fas fa-star"></i></span>
                                </h3>
                                @if (Auth::user())
                                    <p class="text-sm">{{ auth::user()->email }}</p>
                                @endif

                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo date('Y , M, d'); ?> </p>
                            </div>

                        </div>

                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="btn btn-primary mt-2 mb-2 mr-5">Logout <i
                            class="fa fa-signout"></i></a>
                </div>
            </li>

        @else

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{ url('user/account/password') }}" class="dropdown-item">

                        <div class="media">

                            @if (!empty(Auth::user()->image))
                                @if (file_exists('storage/' . Auth::user()->image))
                                    <img src="{{ url('storage/' . Auth::user()->image) /* asset('dist/img/user1-128x128.jpg') */ }}"
                                        alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                @endif
                            @endif


                            <div class="media-body">

                                <h3 class="dropdown-item-title">
                                    Profile
                                    <span class="float-right text-sm text-primary"><i class="fas fa-star"></i></span>
                                </h3>
                                @if (Auth::user())
                                    <p class="text-sm">{{ auth::user()->email }}</p>
                                @endif

                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo date('Y , M, d'); ?> </p>
                            </div>

                        </div>

                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="btn btn-primary mt-2 mb-2 mr-5">Logout <i
                            class="fa fa-signout"></i></a>
                </div>
            </li>

        @endif


        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
