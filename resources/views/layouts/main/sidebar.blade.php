<aside class="main-sidebar sidebar-dark-primary elevation-1">
  <!-- Brand Logo -->
  <a href="/" class="brand-link" style="
    display: flex; 
    justify-content: flex-start;
">
    <img src="{{ asset('assets/images/logo.png')}}" alt="AdminLTE Logo" class="brand-image elevation-0" style="">
    <span class="brand-text font-weight-light"></span>
    <br>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img
          src="{{ (Auth::user()->avatar) ? asset( '/storage/'.Auth::user()->avatar ) : asset('/assets/images/placeholder.png') }}"
          style="
          width: 2.2em;
          aspect-ratio: 1 / 1;
      " class="img-circle elevation-2 object-fit-cover" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('profile.index') }}" class="d-block"> {{Auth::user()->name}}
          {{(Auth::user()->role) ? " | ".Auth::user()->role : "" }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link @yield('dashboard')">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('packages.index')}}" class="nav-link @yield('packages')">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Packages
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('categories.index')}}" class="nav-link @yield('categories')">
            <i class="nav-icon fas fa-shapes"></i>
            <p>
              Categories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route("enquiries.index") }}" class="nav-link @yield('enquiries')">
            <i class="nav-icon fas fa-envelope-open"></i>
            <p>
              Enquiries
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link @yield('report')">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Reports
              <span class="right badge badge-info">Coming Soon</span>
            </p>
          </a>
        </li>
        <li class="nav-item menu-close">
          <a href="#" class="nav-link @yield('profile')">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('profile.index')}}" class="nav-link @yield('profile')">
                <i class="far fa-user nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" title="Logout" class="nav-link" role="button" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                  <i class="fas fa-sign-out-alt nav-icon"></i>

                  <p>Logout</p>
                </a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <div class="sidebar-bottom">

  </div>
  <!-- /.sidebar -->
</aside>