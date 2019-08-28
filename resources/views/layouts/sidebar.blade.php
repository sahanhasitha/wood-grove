<aside id="sidebar-left" class="sidebar-left">

     <div class="wrapper">
         <div class="sidebar">
             <div class="sidebar-wrapper">
                 <div class="logo">
                     <img src="{{ asset('img/main-logo.png') }}" alt="">
                 </div>

                 <ul class="nav">
                     <li class="{{ Request::is('home') ? 'active' : '' }}">
                         <a class="nav-link " href="{{ route('home') }}">
                             <i class="fas fa-home" aria-hidden="true"></i>
                             <span>Dashboard</span>
                         </a>

                     </li>
                     @if(Auth::user()->is_admin!=0)
                      <li class="{{ Request::is('types') ? 'active' : '' }}">
                          <a class="nav-link " href="{{ route('types') }}">
                              <i class="fas fa-cubes"></i><span>Types</span>
                          </a>
                      </li>
                      <li class="{{ Request::is('companies') ? 'active' : '' }}">
                          <a class="nav-link "
                             href="{{ route('companies') }}">
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
                          <a class="nav-link "
                              href="{{ route('products') }}">
                              <i class="fas fa-sitemap" aria-hidden="true"></i>
                              <span>Products </span>
                          </a>
                      </li>
                      <li class="{{ Request::is('services') ? 'active' : '' }}">
                          <a class="nav-link "
                              href="{{ route('services') }}">
                              <i class="fab fa-buffer" aria-hidden="true"></i>
                              <span>Services </span>
                          </a>
                      </li>
                      <li class="{{ Request::is('reservations') ? 'active' : '' }}">
                          <a class="nav-link "
                              href="{{ route('reservations') }}">
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
         <div class="main-panel" style="border:none!important">

         </div>
     </div>
</aside>
