@extends('layouts.base')
@section('content-base')
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
                    @yield('content-card')
                
                    </div>
                    </div>
                </div>
            </div>
    </div>
@endif
@endauth

</main>
@endsection