$('.deleteBtn').on('click',function(){
    var id = $(this).data('id');
    var url = $(this).data('url');
    var _token = token;
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'DELETE',
                dataType: 'json',
                url: url,
                data: {id: id,_token: _token},
                success: function (data) {
                    if (data.status == false) {
                        swal.fire('Error !', data.message, 'error');
                    } else {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                          });
                          setTimeout(() => {
                            location.reload();
                          }, 1500);
                       
                    }
                }
            })
        } else {
            swal("Cancelled", "Entry remain safe", "error");
        }
    });
})