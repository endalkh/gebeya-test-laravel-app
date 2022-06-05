@extends('layouts.app')
<!-- $table->foreignId("store_id")->onDelete("cascade");
            $table->foreignId("product_id")->onDelete("cascade");
            $table->integer("qty");
            $table->decimal("price", 8, 2);
            $table->decimal("total", 8, 2);
            $table->boolean("is_active")->default(1);
            $table->enum("status", ["Open", "Paid", "Completed"]); -->

@section('content')
<form  method="POST" action="{{ route('product.store') }}">
  @csrf
  @include('pages/success')

  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Product</label>
    <select class="form-select @error('product_id') is-invalid @enderror" id="inputGroupSelect01" name="product_id">
      <option selected disabled >Choose...</option>
        @foreach ($products as $product)
              <option  value={{$product->id}}>{{ $product->name }}</option>
        @endforeach
  </select>
  @error('product_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror

  </div>
  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Quanity</label>
  <input type="text" id="form1" class="form-control @error('qty') is-invalid @enderror" name="qty" />
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Quantity</label>
  <input type="number" min="1"  id="form1" class="form-control @error('qty') is-invalid @enderror" name="qty" />
    @error('qty')
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
  <!-- Text input -->
  <div class="form-outline mb-4">
  <label class="form-label" for="form1">Total</label>
  <input type="number" min="1"  id="form1" class="form-control @error('total') is-invalid @enderror" name="total" />
    @error('total')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  "Open", "Paid", "Completed"
  <div class="form-outline mb-4">
    <label class="form-label" for="form2">Store</label>
    <select class="form-select @error('status') is-invalid @enderror" id="inputGroupSelect01" name="status">
              <option  value="Open">Open</option>
              <option  value="Paid">Paid</option>
              <option  value="Completed">Completed</option>
  </select>
  @error('status')
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