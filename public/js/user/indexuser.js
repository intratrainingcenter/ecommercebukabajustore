$(document).ready(function () {
  $('#datatable').DataTable();
  // set timeout show alert
  setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

// filter show data with code position
$(document).on('click','.Position',function () {
  codeposition = $(this).attr('positionCode');
  if (codeposition == 'all') {
      loaddatauser();
  }else{
    $.ajax({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
       },
       method:'post',
       url: location.origin+"/user/positionuser",
       data:{code : codeposition},
       success:function (data) {
         console.log(data);
          $('.loaddatauser').html(data);
      }
     });
  }
});

// enter id value to modal delete
$(document).on('click','.deleteData',function () {
   $('#modalDelete').modal('show');
   user_id = $(this).attr('attr-id');
   $(document).find('#iduser').val(user_id);
});

// process delete data user by ajax
$('#deleteUser').click(function () {
    user_id = $(document).find('#iduser').val();
    $.ajax({
      headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
        },
        method:'delete',
        url: location.origin+"/user/deleteuser",
        data:{iduser:user_id},
        success:function (data) {
          loaddatauser();
          $('#modalDelete').modal('hide');
          if(data == 'success'){
            swal(
            'Deleted!',
            'Data User has been deleted.',
            'success',
            );
          }
        }
      });
    });

    // Load show data user
    function loaddatauser()
    {
      $.ajax({
          headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
          },
          method:'get',
          url:location.origin+'/user/loaddatauser',
          success:function (data) {
            $('.loaddatauser').html(data);
          }
        });
    }
