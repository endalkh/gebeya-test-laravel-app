@extends('layouts.app')

@section('content')
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($stores as $store)
      <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$store->name}}</td>
      <td>{{$store->owner->name}}</td>
      <td>
        <a class="btn btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a class="btn btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>   
        <a class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection