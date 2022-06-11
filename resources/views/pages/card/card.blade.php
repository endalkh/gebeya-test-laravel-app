<div class="card client-home" >
  <form  method="POST" action="{{ route('order.store')}}"> 
      @csrf  
      <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/3.webp" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">Some quick example text to build.</p>
        <p class="card-text">Price: {{$product->price}}</p>

        @include('pages/success')
  
      @csrf
      <button  type="button"  class="btn btn-primary text-secondary" onclick="addToCart({{$product}},{{Auth::user()}})" >{{$button}}</button>
      <!-- client-home-card -->
  </form>
  </div>
<script>
  const addToCart=(product,user)=>{
    var url="{{ route('cart.store') }}";
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // Start Ajax call
      $.ajax({
              url: url,
              method: 'POST',
              data: {
                product_id:product.id,
                created_by:user.id,
                price:product.price,
                qty:1,
              },
              success: function (data) {
                      swal({
                          title: "Your data added successfully!",
                          type: "success",
                          icon: "success",
                      });
                  },   
              error:function(error){
                swal({
                    title: "Unable to add to cart",
                    type: "error",
                    icon: "error",
                });
              }
          }); // end of ajax call
  }
</script>
</div>

