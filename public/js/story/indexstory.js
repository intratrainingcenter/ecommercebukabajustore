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
});
