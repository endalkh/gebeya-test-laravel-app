$(document).ready(function(){
    $('#view_category').on('click', function () {
        swal("Are you sure you want to do this?", {
            buttons: ["Oh noez!", true],
          });
  
    });
    $('#del_category').on('click', function () {
        e.preventDefault();
        // var id = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });

    });

});