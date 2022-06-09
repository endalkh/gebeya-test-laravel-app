@extends('layouts.app')
@section('content')
@auth
    @if(Auth::check() && Auth::user()->role!='user')
        <!-- Sidebar of a layout -->
        @include('pages.sidebar.sidebar')

    @endif
    @endauth 

    <!-- Navbar of a layout -->
    @include('pages.navbar.navbar')



    <main class="py-2 " style="max-height:80vh;overflow:auto">
        @auth
        @yield('content-base')
        @endauth

        @guest
        @yield('content-base')
        @endguest

    </main>

    

@endsection
