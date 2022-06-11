@extends('layouts.base')

@section('content-base')
<table class="table table-striped">

  @csrf
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Created By</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($carts as $cart)
      <tr>
      <td></td>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$cart->product->name}}</td>
      <td>
        <input required type="number" class="qty" name='qty' value={{$cart->qty}} min="1" max="100"/>
       </td>
      <td>{{$cart->product->price}}</td>
      <td>{{$cart->createdBy->name}}</td>
        @if($cart->is_active)
        <td><i class="fa fa-check text-primary" style="font-size:15px"></i></td>
        @else 
        <td><i class="fa fa-times text-danger" style="font-size:15px"></i></td>
        @endif
      <td>
      <form method="POST" action="{{route('cart.update',$cart)}}">
        @method('put')
        @csrf
          <a class="btn btn-outline-primary"  onclick="updateCart({{$cart}})"><i class="fa fa-check" aria-hidden="true"></i></a>
          <a class="btn btn-outline-danger" id="del_category"><i class="fa fa-trash"></i></a>
          <a class="btn btn-outline-primary" href="{{route('cart.show',$cart) }}" ><i class="fa fa-edit" aria-hidden="true"></i></a>    
      </td>
<!--  -->
    </tr>
    @endforeach
  </tbody>

<script>
const updateCart=(cart)=>{
        // const qty=$("input[name=qty]").val());
        // const qty= $("input[name=qty]").val();
        var qty = $(".qty").val();
        alert(qty);
        
        var url="{{ route('cart.update',$cart) }}";
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        console.log(cart);
        console.log(qty);
        // Start Ajax call
        $.ajax({
                url: url,
                method: 'POST',
                data: {
                    qty:qty,
                },
                    success: function (data) {
                        swal({
                            title: "Your data added successfully!",
                            type: "success",
                            icon: "success",
                        });
                    },   
                error:function(error){
                    console.log(error);
                    swal({
                        title: "Unable to add to cart",
                        type: "error",
                        icon: "error",
                    });
                }
            }); // end of ajax call
    }
</script>
</table>
@endsection