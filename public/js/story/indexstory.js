$(document).ready(function () {
  $('#datatable').DataTable();

  setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);

  $('.summernote').summernote({
      height: 300,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true                 // set focus to editable area after initializing summernote
  });

  // set timeout show alert
  setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

// enter id value in modal delete
$(document).on('click','.deleteData',function () {
   $('#modalDelete').modal('show');
   story_id = $(this).attr('attr-id');
   $(document).find('#idStory').val(story_id);
});

// procsess delete story
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

    // load data story all
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
