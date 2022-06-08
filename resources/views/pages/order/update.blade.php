@extends('layouts.homecard')

@section('content-card')
<form  method="POST" action="{{ route('order.update') }}">
  @csrf
  @include('pages/success')

  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Product</label>
    <select class="form-select @error('product_id') is-invalid @enderror" id="inputGroupSelect01" name="product_id">
      <option selected disabled >Choose...</option>
        @foreach ($products as $product)
              <option  value={{$product->id}} {{($product->id==$order->order->id)?"selected":"" }}>{{ $product->name }}</option>
        @endforeach
    </select>
    @error('product_id')
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
              <option  value={{$store->id}} {{($store->id==order->store->id)?"selected":"" }}>{{ $store->name }}</option>
        @endforeach
    </select>
    @error('store_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Quantity</label>
  <input type="number" min="1"  id="form1" value={{$order->qty}} class="form-control @error('qty') is-invalid @enderror" name="qty" />
    @error('qty')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Price</label>
  <input type="number" min="1" value={{$order->price}}  id="form1" class="form-control @error('price') is-invalid @enderror" name="price" />
    @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Dropdown select -->

  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Status</label>
    <select class="form-select @error('status') is-invalid @enderror" id="inputGroupSelect01" name="status">
          <option selected disabled >Choose...</option>
          <option  value="Open">Open</option>
          <option  value="Open">Paid</option>
          <option  value="Open">Completed</option>
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