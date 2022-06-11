          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                <li>
                    @guest
                        <a  href="{{ route('login') }}" style='margin-right:20px'>
                        Login
                        </a>
                       
                        <a  href="{{ route('signup') }}">
                        Sign up
                        </a>
                </li>
                    @endguest

                @auth
                <li class="nav-item dropdown ms-auto hidden-arrow d-flex align-items-center">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                            class="rounded-circle"
                            height="30"
                            alt=""
                            loading="lazy"
                        />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <span class="dropdown-item">{{Auth::user()->name}}</span>
                        <div class="dropdown-divider"></div>

                        <a href="{{route('cart')}}" class="dropdown-item">My Carts</a>
                        <a href="{{ route('order') }}" class="dropdown-item">My Orders</a>
                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">My account</a>

                        <a href="#" class="dropdown-item">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="dropdown-item">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">     
                            @csrf
                        </form>

                    </div>
                </li>
                @endauth

                </ul>


                