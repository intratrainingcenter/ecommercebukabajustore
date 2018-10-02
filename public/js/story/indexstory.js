$(document).ready(function () {
  $('#datatable').DataTable();

  // set timeout show alert
  setTimeout(function(){
    $(document).find('.alert').fadeOut('slow');
  },3000);
});

$('.deleteData').click(function () {
   $('#modalDelete').modal('show');
   story_id = $(this).attr('attr-id');
   
   $(document).find('#story_id').val(story_id);
});

$('#functionDelete').click(function () {
    $('#modalDelete').modal('hide');
    swal(
        'Deleted!',
        'Data Promo has been deleted.',
        'success'
        )
});
