$(document).ready(function() {
  $('#datatable').DataTable();
  setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

$('.validateProcess').on('click',function(){
  let codereturn = $(this).attr('attr-code');
  $(document).find('#codeProcessreturn').val(codereturn);
  $('#modalreturnProcess').modal('show');
});

$('.validateReceived').on('click',function(){
  let codereturn = $(this).attr('attr-code');
  $(document).find('#codeReceivedreturn').val(codereturn);
  $('#modalreturnReceived').modal('show');
});

$('.validatereject').on('click',function(){
  let codereturn = $(this).attr('attr-code');
  $(document).find('#coderejectreturn').val(codereturn);
  $('#modalreturnReject').modal('show');
})
