<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('favicon.ico') }}" alt="Admin{{ $footer->title }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin {{ $footer->title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user5-128x128.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if(Route::current()->getName() == 'home') active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview @if(in_array(Route::current()->getName(), ['cat_career', 'career_list'])) menu-open @endif">
                    <a href="#" class="nav-link @if(in_array(Route::current()->getName(), ['cat_career', 'career_list'])) active @endif">
                        <i class="nav-icon fas fa-network-wired"></i>
                        <p>
                            Career
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cat_career') }}" class="nav-link @if(Route::current()->getName() == 'cat_career') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('career_list') }}" class="nav-link @if(Route::current()->getName() == 'career_list') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item has-treeview @if(in_array(Route::current()->getName(), ['transaction', 'customer'])) menu-open @endif">
                    <a href="#" class="nav-link @if(in_array(Route::current()->getName(), ['transaction', 'customer'])) active @endif">
                      <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                          Transaction
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customer') }}" class="nav-link @if(Route::current()->getName() == 'customer') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaction') }}" class="nav-link @if(Route::current()->getName() == 'transaction') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transaction</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @if(in_array(Route::current()->getName(), ['gallery', 'lable'])) menu-open @endif">
                    <a href="#" class="nav-link @if(in_array(Route::current()->getName(), ['gallery', 'lable'])) active @endif">
                      <i class="nav-icon fas fa-images"></i>
                        <p>
                          Gallery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('lable') }}" class="nav-link @if(Route::current()->getName() == 'lable') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('gallery') }}" class="nav-link @if(Route::current()->getName() == 'gallery') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Images</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slider') }}" class="nav-link @if(Route::current()->getName() == 'slider') active @endif">
                    <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('client') }}" class="nav-link @if(Route::current()->getName() == 'client') active @endif">
                    <i class="nav-icon fas fa-users"></i>
                        <p>
                            Our Client
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service') }}" class="nav-link @if(Route::current()->getName() == 'service') active @endif">
                    <i class="nav-icon fas fa-stream"></i>
                        <p>
                            Our Service
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link @if(Route::current()->getName() == 'about') active @endif">
                    <i class="nav-icon fas fa-map-marked-alt"></i>
                        <p>
                            About Us
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subscribe') }}" class="nav-link @if(Route::current()->getName() == 'subscribe') active @endif">
                    <i class="nav-icon fas fa-forward"></i>
                        <p>
                            Subscribe
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>