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
     
                @endauth
            <button class="navbar-toggler" role="button" data-toggle="collapse"   data-target=".collapse" aria-controls="navbarContent" aria-expanded="false" >
                    <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">

                @include('pages.search.search')
                @include('pages.navbar.nav-element')
     
            </div>    
        </nav>
    </div>