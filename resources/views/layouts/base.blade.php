@extends('layouts.app')
@section('content')
@auth
    @if(Auth::check() && Auth::user()->role!='user')
    <nav id="sidebar">
        <div class="sidebar-header">
            <button class="navbar-toggler bg-light" type="button" id="sidebarCollapseClose" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="fa fa-bars fa-lg "></span>
            </button>
        </div>
        <ul class="list-unstyled components">
                <p>CRM</p>
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
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                    @csrf
                </form>
                </li>
        </ul>
    </nav>
    @endif
    @endauth 

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @auth
                @if(Auth::check() && Auth::user()->role!='user')
                <div class="col px-3 px-md-0">
                    <!-- toggler -->
                    <a data-toggle="collapse" href="#" role="button" class="p-1" id="sidebarCollapse">
                        <i class="fa fa-bars fa-lg"></i>
                    </a>
                </div>
                @endif
                <button class="navbar-toggler" role="button" data-toggle="collapse"   data-target=".collapse" aria-controls="navbarSupportedContent" aria-expanded="false" >
                        <span class="navbar-toggler-icon"></span>
                </button>
                @endauth
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav me-auto">
                    <div class="input-group mb-4">
                        <div class="input-group-text p-0">
                            <select class="form-select form-select-lg shadow-none bg-light border-0">
                                <option>All</option>
                                @foreach ($categories as $category)
                                <option>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" class="form-control" placeholder="Search Here">
                        <button class="input-group-text shadow-none px-4 btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>        
                </ul>
                @endauth

                            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @auth
                            <!-- Avatar -->
                    <li class="nav-item dropdown" >

                                <a
                                    class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                                    href="#"
                                    id="navbarDropdownMenuLink"
                                    role="button"
                                    data-mdb-toggle="dropdown"
                                    aria-expanded="false"
                                    >
                                    <li>
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                    </form>
                </li>
                                    <img
                                        src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg"
                                        class="rounded-circle"
                                        height="30"
                                        alt=""
                                        loading="lazy"
                                        />
                                </a>
                            @endauth

                </ul>
            </div>    
        </nav>
    </div>

    <main class="py-2 " style="max-height:80vh;overflow:auto">
        @auth
        @yield('content-base')
        @endauth

        @guest
        @yield('content-base')
        @endguest
    

    </main>

    

@endsection
