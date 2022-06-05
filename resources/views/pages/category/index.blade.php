@extends('layouts.app')

@section('content')
<table class="table table-striped">
  @csrf
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
  @endif
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Store</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
      <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->store->name}}</td>
      <td>
        <a class="btn btn-outline-primary" id="view_category"><i class="fa fa-eye" aria-hidden="true"></i></a>
        <a class="btn btn-outline-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>   
        <a class="btn btn-outline-danger" id="del_category"><i class="fa fa-trash"></i></a>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection