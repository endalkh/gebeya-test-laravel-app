<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gebeya App</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 
        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
@auth 
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
            @if(Auth::check() && Auth::user()->is_admin)
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
            @if(Auth::check() && Auth::user()->is_admin)
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
@endauth 

<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            @auth
            <div class="col px-3 px-md-0">
                <!-- toggler -->
                <a data-toggle="collapse" href="#" role="button" class="p-1" id="sidebarCollapse">
                    <i class="fa fa-bars fa-lg"></i>
                </a>
            </div>
            <button class="navbar-toggler" role="button" data-toggle="collapse"   data-target=".collapse" aria-controls="navbarSupportedContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
            </button>
            @endauth
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @auth
            @if(isset($categories))
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
            @endif
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

    <main class="py-2 " style="max-height:80vh;overflow:auto">
    @auth
    @if(isset($title))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p class="font-weight-bold text-primary">{{$title?:''}}</p>
                    </div>
                    <div class="card-body">
                    @yield('content')
                
                    </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
    @endauth
    

    @guest
        @yield('content')
    @endguest


</main>
    


        

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>

</html>