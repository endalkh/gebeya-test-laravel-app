@extends('layouts.app')


@section('content')
<form  method="POST" action="{{ route('user.update',$user) }}">
  @csrf
  @include('pages/success')
  @method('put')

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Name</label>
  <input type="text" min="1"  id="form1" value='{{$user->name}}' class="form-control @error('name') is-invalid @enderror" name="name" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Email</label>
  <input type="email"  id="form1" value='{{$user->email}}' class="form-control @error('email') is-invalid @enderror" name="email" />
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Password</label>
  <input type="password"  id="form1"  class="form-control @error('password') is-invalid @enderror" name="password" />
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="form-check">
    <input type="checkbox" {{($user->is_active)?"checked":""}} class="form-check-input @error('is_active') is-invalid @enderror" id="exampleCheck1" name='is_active'>
    <label class="form-check-label" for="exampleCheck1" >Active</label>
  </div>

  
  <div class="form-check">
    <input type="checkbox"  class="form-check-input @error('is_admin') is-invalid @enderror" id="exampleCheck2" name='is_admin' {{($user->is_admin)? "checked":""}}>
    <label class="form-check-label" for="exampleCheck2">Make this user Admin</label>
  </div>

  <br>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
</form>
@endsection