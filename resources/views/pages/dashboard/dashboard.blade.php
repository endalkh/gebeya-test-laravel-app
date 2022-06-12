@extends('layouts.base')

@section('content-base')
<main class="py-2 " style="max-height:80vh;overflow:auto">
@auth
@if(isset($title))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Dashboard goes here</h1>
                <p>
                Hell there!  I want you to let you know about the test project. The project is very huge for a full time developer who handles a test in his/her part-time. Because We should handle the layout, model, the migrations and the controller and If you assume this can be finished in a week from scratch, I don’t think this is possible. 
Thank You Anyway

                </p>
            
            </div>
        </div>
    </div>
@endif
@endauth

</main>
@endsection