@extends('layouts.homecard')

@section('content-card')
<form  method="post" action="{{ route('product.update',$product) }}">
  @include('pages/success')
  @method('put')
  @csrf

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Name</label>
  <input type="text" id="form1" value='{{$product->name}}' class="form-control @error('name') is-invalid @enderror" name="name" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
    <!-- Text input -->
    <div class="form-outline mb-4">
  <label class="form-label" for="form1">Quanity</label>
  <input type="number" min="1" id="form1" value='{{$product->qty}}' class="form-control @error('qty') is-invalid @enderror" name="qty" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Price</label>
  <input type="number" min="1"  id="form1" value='{{$product->price}}' class="form-control @error('price') is-invalid @enderror" name="price" />
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <!-- Select Store From Dropdown -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Store</label>
    <select class="form-select @error('store_id') is-invalid @enderror" id="inputGroupSelect01" name="store_id">
      <option selected disabled >Choose...</option>
          @foreach ($stores as $store)
                <option selected value={{$store->id}}  {{($store->id==$product->store->id)?"selected":"" }}>{{ $product->name }} </option>
          @endforeach
    </select>
      @error('store_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  <!-- Select Category From Dropdown -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Category</label>
    <select class="form-select @error('category_id') is-invalid @enderror" id="inputGroupSelect01" name="category_id">
      <option selected disabled >Choose...</option>
          @foreach ($categories as $category)
                <option selected value={{$store->id}}  {{($category->id==$product->category->id)?"selected":"" }}>{{ $category->name }} </option>
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
  <input type="file" id="form1"  class="form-control @error('image') is-invalid @enderror" name="image" />
    @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
    <!-- Create checkbox for Active status -->
    <div class="form-check">
      <input type="checkbox" {{($product->is_active)?"checked":""}} class="form-check-input @error('is_active') is-invalid @enderror" id="exampleCheck1" name='is_active'>
      <label class="form-check-label" for="exampleCheck1" >Active</label>
    </div>
    <br>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
</form>
@endsection
