<nav id="sidebar">
        <div class="sidebar-header">
            <button class="navbar-toggler bg-light" type="button" id="sidebarCollapseClose" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fa fa-bars fa-lg "></span>
            </button>
        </div>
        <ul class="list-unstyled components">
                <!-- <p>CRM</p> -->
                <!-- <li> -->
                <p><a href="{{ route('home') }}">CRM</a></p>
                <!-- </li> -->
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Category</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a  href="{{ route('category.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('category') }}">List</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::check() && Auth::user()->role=='admin')
                <li>
                    <a href="#storeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Store</a>
                    <ul class="collapse list-unstyled" id="storeSubmenu">
                        <li>
                            <a  href="{{ route('store.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('store') }}">List</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li>
                <li>
                    <a href="#productSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                    <ul class="collapse list-unstyled" id="productSubmenu">
                        <li>
                            <a  href="{{ route('product.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('product') }}">List</a>
                        </li>
            
                    </ul>
                </li>
                <li>
                    <a href="#orderSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Order</a>
                    <ul class="collapse list-unstyled" id="orderSubmenu">
                        <li>
                            <a  href="{{ route('order.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('order') }}">List</a>
                        </li>
                        
                    </ul>
                </li>
                <li>  
                @if(Auth::check() && Auth::user()->role=='admin')
                <!-- Admin only options -->
                <li>
                    <a href="#UserSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">User</a>
                    <ul class="collapse list-unstyled" id="UserSubmenu">
                        <li>
                            <a  href="{{ route('user.create') }}">Add</a>
                        </li>
                        <li>
                            <a href="{{ route('user') }}">List</a>
                        </li>
                    </ul>
                </li>
                <li> 
                @endif
                <!--  -->

                <hr data-content="AND" class="hr-text">
                </li>
                <li>
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
                </li>
        </ul>
    </nav>