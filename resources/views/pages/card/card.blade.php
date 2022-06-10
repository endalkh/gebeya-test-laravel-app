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
    var url = $(this).attr('action');
    swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          $.ajax({
                  url: url,
                  method: 'POST',
                  data: {
                    product_id:product.id,
                    created_at:user.id,
                  },
                  success: function (data) {
                                //
                      },
                      
                  error:function(error){
                    console.log(error);
                    swal("hell errors");
                  }
              });

          if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    // 
    // 
      // e.preventDefault();
      // var id = $(this).data('id');
      // swal({
      //         title: "Are you sure!",
      //         type: "error",
      //         confirmButtonClass: "btn-danger",
      //         confirmButtonText: "Yes!",
      //         showCancelButton: true,
      //     });
      //     function() {

      // };
  }
</script>
</div>

