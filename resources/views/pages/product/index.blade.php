@extends('layouts.app')

@section('content')
<table class="table table-striped">
  @include('pages/success')

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Store</th>
      <th scope="col">Quanity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
      <tr>
          <th scope="row">{{$loop->index+1}}</th>
          <td>{{$product->name}}</td>
          <td>{{$product->store->name}}</td>
          <td>{{$product->qty}}</td>
          <td>
          <form method="post" action="{{route('product.destroy',$product)}}">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger"  type="submit"><i class="fa fa-trash"></i></button>
              <a class="btn btn-outline-primary" ><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a class="btn btn-outline-primary" ><i class="fa fa-edit" aria-hidden="true"></i></a>    
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection