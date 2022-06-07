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
      <th scope="col">Active</th>
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
          @if($product->is_active)
          <td><i class="fa fa-check text-primary" style="font-size:15px"></i></td>
          @else 
          <td><i class="fa fa-times text-danger" style="font-size:15px"></i></td>
          @endif
   
          <td>
          <form method="post" action="{{route('product.destroy',$product)}}">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger"  type="submit"><i class="fa fa-trash"></i></button>
              <a class="btn btn-outline-primary" ><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a class="btn btn-outline-primary" href="{{route('product.show',$product) }}" ><i class="fa fa-edit" aria-hidden="true"></i></a>    
    
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection