<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">

                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-parent {{ Request::is('types') ? 'nav-expanded' : '' }}{{Request::is('companies') ? 'nav-expanded' : '' }}">
                        <a class="nav-link" href="#">
                            <i class="fas fa-columns" aria-hidden="true"></i>
                            <span>Company Management</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                @if(Auth::user()->is_admin==1)
                               <a class="nav-link {{ Request::is('types') ? 'active' : '' }}" href="{{ route('types') }}">
                                   Types
                               </a>
                                @else
                                <a class="nav-link {{ Request::is('types') ? 'active' : '' }}" href="/" onclick="return false;">
                                    Types <small class="text-warning">(only admin can access this)</small>
                                </a>
                                @endif

                            </li>
                            <li>
                                 @if(Auth::user()->is_admin==1)
                                <a class="nav-link {{ Request::is('companies') ? 'active' : '' }}" href="{{ route('companies') }}">
                                    Companies
                                </a>
                                @else
                                <a class="nav-link {{ Request::is('companies') ? 'active' : '' }}" href="/" onclick="return false;">
                                    Companies <small class="text-warning">(only admin can access this)</small>
                                </a>
                                 @endif
                            </li>
                        </ul>
                   </li>

                   <li>
                       <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users') }}">
                           <i class="fas fa-users" aria-hidden="true"></i>
                           <span>Users </span>
                       </a>
                   </li>
                   @endif
                   <li>
                       <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ route('products') }}">
                           <i class="fas fa-sitemap" aria-hidden="true"></i>
                           <span>Products </span>
                       </a>
                   </li>
                   <li>
                       <a class="nav-link {{ Request::is('services') ? 'active' : '' }}" href="{{ route('services') }}">
                           <i class="fab fa-buffer" aria-hidden="true"></i>
                           <span>Services </span>
                       </a>
                   </li>
                   <li>
                       <a class="nav-link {{ Request::is('reservations') ? 'active' : '' }}" href="{{ route('reservations') }}">
                           <i class="fas fa-book" aria-hidden="true"></i>
                           <span>Reservations </span>
                       </a>
                   </li>
                   <li>
                       <a class="nav-link {{ Request::is('events') ? 'active' : '' }}" href="{{ route('events') }}">
                           <i class="fas fa-calendar-week" aria-hidden="true"></i>
                           <span>Events </span>
                       </a>
                   </li>
                </ul>
            </nav>

        </div>

        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>


    </div>

</aside>
