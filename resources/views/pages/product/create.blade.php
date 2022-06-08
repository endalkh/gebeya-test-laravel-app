@extends('layouts.homecard')

@section('content-card')
<form  method="POST" action="{{ route('product.store') }}">
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
  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Quanity</label>
  <input type="number" min='1' id="form1" class="form-control @error('qty') is-invalid @enderror" name="qty" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Price</label>
  <input type="number" min="1"  id="form1" class="form-control @error('price') is-invalid @enderror" name="price" />
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>


  <!-- Dropdown selection  -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Store</label>
    <select class="form-select @error('store_id') is-invalid @enderror" id="inputGroupSelect01" name="store_id">
      <option selected disabled >Choose...</option>
        @foreach ($stores as $store)
              <option  value={{$store->id}}>{{ $store->name }}</option>
        @endforeach
    </select>
    @error('store_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  <!-- Dropdown selection  -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Category</label>
    <select class="form-select @error('category_id') is-invalid @enderror" id="inputGroupSelect01" name="category_id">
      <option selected disabled >Choose...</option>
        @foreach ($categories as $category)
              <option  value={{$category->id}}>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>


  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Product Image</label>
  <input type="file" id="form1" class="form-control @error('image') is-invalid @enderror" name="image" />
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
</form>
@endsection