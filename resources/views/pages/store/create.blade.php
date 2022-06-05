@extends('layouts.app')


@section('content')
<form  method="POST" action="{{ route('store.store') }}">
  @csrf
  @include('pages/success')

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Name</label>
  <input type="text" id="form1" class="form-control @error('name') is-invalid @enderror" name="name" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>



  <div class="form-outline mb-4">
    <label class="form-label" for="form2">User</label>
    <select class="form-select @error('user_id') is-invalid @enderror" id="inputGroupSelect01" name="user_id">
      <option selected disabled >Choose...</option>
        @foreach ($users as $user)
              <option  value={{$user->id}}>{{ $user->name }}</option>
        @endforeach
  </select>
  @error('user_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
</form>
@endsection