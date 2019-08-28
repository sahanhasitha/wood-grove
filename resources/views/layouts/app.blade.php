<!doctype html>
<html class="fixed sidebar-left-open">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>The Tap</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    @include('layouts.css')
    <!-- Head Libs -->
    <script src="{{asset('vendor/modernizr/modernizr.js')}}"></script>
</head>
<body>
<section class="body">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
      <div class="container-fluid">
          <div class="navbar-wrapper">
              <div class="navbar-toggle d-inline">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu"
              aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                  </button>
              </div>
              <a class="navbar-brand"
                  href="javascript:void(0)">
                @if (Request::is('*/*'))
                {{ str_replace('add new', 'edit', str_replace('-', ' ', Route::currentRouteName())) }}
                @else
                {{ str_replace('-', ' ', Route::currentRouteName()) }}
                @endif
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
              aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav ml-auto">
                  <li class="search-bar input-group">
                      <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i
                              class="tim-icons icon-zoom-split"></i>
                          <span class="d-lg-none d-md-block">Search</span>
                      </button>
                  </li>
                  <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                          <div class="photo">
                              <img src="{{ asset('img/user.png') }}" alt="Profile Photo">
                          </div>
                          <b class="caret d-none d-lg-block d-xl-block"></b>
                          <p class="d-lg-none">
                              Log out
                          </p>
                      </a>
                      <ul class="dropdown-menu dropdown-navbar">
                          <li class="dropdown-divider"></li>
                          <li class="nav-link text-center"><form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                            </form>
                          </li>
                      </ul>
                  </li>
                  <li class="separator d-lg-none"></li>
              </ul>
          </div>
        <div class="card mobile-menu">
          <div class="collapse navbar-collapse" id="menu">
              <ul class="navbar-nav ml-auto">
                  <li class="{{ Request::is('products') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('home') }}">
                          <i class="fas fa-home" aria-hidden="true"></i>
                          <span>Home </span>
                      </a>
                  </li>
                  @if(Auth::user()->is_admin!=0)
                  <li class="{{ Request::is('types') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('types') }}">
                          <i class="fas fa-cubes"></i><span>Types</span>
                      </a>
                  </li>
                  <li class="{{ Request::is('companies') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('companies') }}">
                          <i class="fas fa-building"></i><span>Companies</span>
                      </a>
                  </li>
                  <li class="{{ Request::is('users') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('users') }}">
                          <i class="fas fa-users" aria-hidden="true"></i>
                          <span>Users </span>
                      </a>
                  </li>
                  @endif
                  <li class="{{ Request::is('products') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('products') }}">
                          <i class="fas fa-sitemap" aria-hidden="true"></i>
                          <span>Products </span>
                      </a>
                  </li>
                  <li class="{{ Request::is('services') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('services') }}">
                          <i class="fab fa-buffer" aria-hidden="true"></i>
                          <span>Services </span>
                      </a>
                  </li>
                  <li class="{{ Request::is('reservations') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('reservations') }}">
                          <i class="fas fa-book" aria-hidden="true"></i>
                          <span>Reservations </span>
                      </a>
                  </li>
                  <li class="{{ Request::is('events') ? 'active' : '' }}">
                      <a class="nav-link " href="{{ route('events') }}">
                          <i class="fas fa-calendar-week" aria-hidden="true"></i>
                          <span>Events </span>
                      </a>
                  </li>

              </ul>
          </div>
          </div>
      </div>
  </nav>
  <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <i class="tim-icons icon-simple-remove"></i>
                  </button>
              </div>
          </div>
      </div>
  </div>
  <!-- End Navbar -->
    <div class="inner-wrapper">
        <!-- start: sidebar -->
        @include('layouts.sidebar')
        <!-- end: sidebar -->
        @yield('content')
    </div>
</section>
@include('layouts.js')

</body>
</html>
