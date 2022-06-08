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
  <!-- Dropdown select -->

  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Role</label>
    <select class="form-select @error('status') is-invalid @enderror" id="inputGroupSelect01" name="role">
          <option selected disabled >Choose...</option>
          <option  value="Open">admin</option>
          <option  value="Open">client</option>
          <option  value="Open">normal user</option>
    </select>
    @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>





  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
</form>
@endsection