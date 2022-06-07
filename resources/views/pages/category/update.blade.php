@extends('layouts.app')


@section('content')
<form  method="post" action="{{ route('category.update',$category) }}">
  @include('pages/success')
  @method('put')
  @csrf

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Name</label>
  <input type="text" id="form1" value='{{$category->name}}' class="form-control @error('name') is-invalid @enderror" name="name" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Store</label>
    <select class="form-select @error('store_id') is-invalid @enderror" id="inputGroupSelect01" name="store_id">
      <option selected disabled >Choose...</option>
          @foreach ($stores as $store)
              @if($store->id==$category->store->id)
                <option selected value={{$store->id}} >{{ $store->name }}</option>
              @else
                  <option  value={{$store->id}}>{{ $store->name }} </option>
              @endif
          @endforeach
    </select>
      @error('store_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>
  <!-- Create checkbox for Active status -->
      <div class="form-check">
      <input type="checkbox" {{($category->is_active)?"checked":""}} class="form-check-input @error('is_active') is-invalid @enderror" id="exampleCheck1" name='is_active'>
      <label class="form-check-label" for="exampleCheck1" >Active</label>
  </div>
    <br>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
</form>
@endsection