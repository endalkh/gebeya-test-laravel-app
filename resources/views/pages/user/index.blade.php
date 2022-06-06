@extends('layouts.app')

@section('content')
<table class="table table-striped">
  @include('pages/success')

  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
      <tr>
          <th scope="row">{{$loop->index+1}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>
          <form method="post" action="{{route('user.destroy',$user)}}">
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