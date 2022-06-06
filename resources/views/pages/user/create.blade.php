@extends('layouts.app')


@section('content')
<form  method="POST" action="{{ route('user.store') }}">
  @csrf
  @include('pages/success')

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Name</label>
  <input type="text" min="1"  id="form1" class="form-control @error('name') is-invalid @enderror" name="name" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Email</label>
  <input type="email"  id="form1" class="form-control @error('email') is-invalid @enderror" name="email" />
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Password</label>
  <input type="password"  id="form1" class="form-control @error('password') is-invalid @enderror" name="password" />
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input @error('is_admin') is-invalid @enderror" id="exampleCheck1" name='is_admin'>
    <label class="form-check-label" for="exampleCheck1">Make this user Admin</label>
  </div>



  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
</form>
@endsection