@extends('layouts.base')

@section('content-base')
<main class="py-2 " style="max-height:80vh;overflow:auto">
@auth
@if(isset($title))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">hello</div>
        </div>
    </div>
@endif
@endauth

</main>
@endsection