<div class="card client-home" >
  <form  method="POST" action="{{ route('cart.store',$product)}}" >   
      <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">Some quick example text to build.</p>
        <p class="card-text">Price: {{$product->price}}</p>

    @include('pages/success')
  
      @csrf
      <button  type="submit"  class="btn btn-primary text-secondary">{{$button}}</button>
  </form>
  </div>
</div>

