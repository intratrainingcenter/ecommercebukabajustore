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
   $(document).find('#idStory').val(story_id);
});

$('#deleteStory').click(function () {
    story_id = $(document).find('#idStory').val();
    $.ajax({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
      },
      method:'delete',
      url: location.origin+"/story/deletestory",
      data:{idStory:story_id},
      success:function (data) {
        loaddatastory();
        $('#modalDelete').modal('hide');
        if(data == 'success'){
          swal(
          'Deleted!',
          'Data Story has been deleted.',
          'success',
          );
        }
      }
    });

  function loaddatastory()
  {
    $.ajax({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
      },
      method:'get',
      url:location.origin+'/story/loadstory',
      success:function (data) {
        $('#loaddatastory').html(data);
      }
    });
  }
});
