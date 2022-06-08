@extends('layouts.homecard')

@section('content-card')
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
      <th scope="col">Active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
      <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->store->name}}</td>
        @if($category->is_active)
        <td><i class="fa fa-check text-primary" style="font-size:15px"></i></td>
        @else 
        <td><i class="fa fa-times text-danger" style="font-size:15px"></i></td>
        @endif
      <td>
      <form method="post" action="{{route('category.destroy',$category)}}">
        @method('delete')
        @csrf
          <a class="btn btn-outline-primary" id="view_category"><i class="fa fa-eye" aria-hidden="true"></i></a>
          <a class="btn btn-outline-danger" id="del_category"><i class="fa fa-trash"></i></a>
          <a class="btn btn-outline-primary" href="{{route('category.show',$category) }}" ><i class="fa fa-edit" aria-hidden="true"></i></a>    
        </form>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection