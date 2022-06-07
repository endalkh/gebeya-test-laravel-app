@extends('layouts.app')


@section('content')
<form  method="post" action="{{ route('store.update',$store) }}" >
  @include('pages/success')
  
  @method('put')
  @csrf

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Name</label>
  <input type="text" id="form1" value='{{$store->name}}' class="form-control @error('name') is-invalid @enderror" name="name" />
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
              @if($user->id==$store->user_id)
                <option selected value={{$user->id}} >{{ $user->name }}</option>
              @else
                  <option  value={{$user->id}}>{{ $user->name }} </option>
              @endif
          @endforeach
    </select>
      @error('user_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
  <!-- Create checkbox for Active status -->
  <div class="form-check">
    <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="exampleCheck1" name='is_active' {{($store->is_active)?"checked":""}} >
    <label class="form-check-label" for="exampleCheck1" >Active</label>
  </div>
  <br>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
</form>
@endsection