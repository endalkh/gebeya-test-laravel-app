@extends('layouts.homecard')

@section('content-card')
<table class="table table-striped">
  @include('pages/success')

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Quanity</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($orders as $order)
      <tr>
          <th scope="row">{{$loop->index+1}}</th>
          <td>{{$order->product->name}}</td>
          <td>{{$order->qty}}</td>
          <td>{{$order->price}}</td>
          <td>{{$order->total}}</td>
          <td>{{$order->status}}</td>
          <td>
          <form method="post" action="{{route('order.destroy',$order)}}">
              @method('delete')
              @csrf
              <button class="btn btn-outline-danger"  type="submit"><i class="fa fa-trash"></i></button>
              <a class="btn btn-outline-primary" ><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a class="btn btn-outline-primary" href="{{route('order.show',$order) }}" ><i class="fa fa-edit" aria-hidden="true"></i></a>     
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection