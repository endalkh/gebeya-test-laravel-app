@extends('layouts.base')

@section('content-base')
<section class='row home-page'>
@foreach($products as $product)
    @include('pages.card.card',['button'=>'Add to Cart'])
@endforeach


</section>

@endsection
