<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <a href="index3.html" class="brand-link">

        @if (!empty(Auth::user()->image))
            @if (file_exists('storage/' . Auth::user()->image))
                <img src="{{ url('storage/' . Auth::user()->image) /* asset('dist/img/user1-128x128.jpg') */ }}"
                    alt="User Avatar" class="brand-image img-circle elevation-3">
            @endif
        @endif

        @if (Auth::user())
            <span class="brand-text font-weight-light">{{ auth::user()->email }}</span>
        @endif

    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                {{-- Admin Menu --}}
                @if (Auth::user()->role == 1)
                    <li class="nav-item menu-open">
                        <a href="{{ url('dashboard/admin_list') }}"
                            class="nav-link @if (Request::segment(2) == 'admin_list') active @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                {{--  <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>

                    <li class="nav-header">MASTER</li>

                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/category') }}"
                            class="nav-link @if (Request::segment(2) == 'category') active @endif">
                            <i class="nav-icon fas fa-cube"></i>
                            <p>
                                Category
                                <span class="right badge badge-primary"><i class="fas fa-cube"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/product/index') }}"
                            class="nav-link @if (Request::segment(2) == 'product') active @endif">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Products
                                <span class="right badge badge-primary"><i class="fas fa-cubes"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/member/index') }}"
                            class="nav-link @if (Request::segment(2) == 'member') active @endif">
                            <i class="nav-icon fas fa-id-card"></i>
                            <p>
                                Member
                                <span class="right badge badge-primary"><i class="fas fa-id-card"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/supplier/index') }}"
                            class="nav-link @if (Request::segment(2) == 'supplier') active @endif">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Supplier
                                <span class="right badge badge-primary"><i class="fas fa-truck"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">TRANSACTION</li>

                    <li class="nav-item">
                        <a href="{{ url('admin/expense/index') }}"
                            class="nav-link @if (Request::segment(2) == 'expense') active @endif">
                            <i class="nav-icon fas fa-adjust"></i>
                            <p>
                                Expenses
                                <span class="right badge badge-primary"><i class="fas fa-adjust"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/purchase/index') }}"
                            class="nav-link @if (Request::segment(2) == 'purchase') active @endif">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Purchases
                                <span class="right badge badge-primary"><i class="fas fa-th"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/sales/index') }}"
                            class="nav-link @if (Request::segment(2) == 'sales') active @endif">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Sales Lists
                                <span class="right badge badge-primary"><i class="fas fa-dollar-sign"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('admin/transaction/index') }}"
                            class="nav-link @if (Request::segment(2) == 'transaction') active @endif">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                New Transaction
                                <span class="right badge badge-primary"><i class="fas fa-cart-plus"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-arrow-down"></i>
                            <p>
                                Active Transaction
                                <span class="right badge badge-primary"><i class="fas fa-arrow-down"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">REPORTS</li>

                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-asterisk"></i>
                            <p>
                                Income
                                <span class="right badge badge-primary"><i class="fas fa-asterisk"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">SYSTEM</li>

                    <li class="nav-item">
                        <a href="{{ url('admin/user/manage') }}"
                            class="nav-link @if (Request::segment(2) == 'user') active @endif ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <span class="right badge badge-primary"><i class="fas fa-users"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Settings
                                <span class="right badge badge-primary"><i class="fas fa-cogs"></i></span>
                            </p>
                        </a>
                    </li>

                    {{-- User Menu --}}
                @elseif(Auth::user()->role == 0)
                    <li class="nav-item menu-open">
                        <a href="{{ url('dashboard/user_list') }}"
                            class="nav-link @if (Request::segment(2) == 'user_list') ? active : '' @endif">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                {{--  <i class="right fas fa-angle-left"></i> --}}
                            </p>
                        </a>


                    <li class="nav-header">TRANSACTION</li>

                    </li>
                    <li class="nav-item">
                        <a href="{{ url('user/transaction/index') }}"
                            class="nav-link @if (Request::segment(2) == 'transaction') active @endif">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                New Transaction
                                <span class="right badge badge-primary"><i class="fas fa-cart-plus"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('user/list/transaction') }}"
                            class="nav-link @if (Request::segment(2) == 'list') active @endif">
                            <i class="nav-icon fas fa-dollar-sign"></i>
                            <p>
                                Transaction Lists
                                <span class="right badge badge-primary"><i class="fas fa-dollar-sign"></i></span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('user/myaccount/account') }}"
                            class="nav-link @if (Request::segment(2) == 'myaccount') active @endif">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                My Account
                                <span class="right badge badge-primary"><i class="fas fa-user"></i></span>
                            </p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

    </div>

</aside>
