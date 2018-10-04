$(document).ready(function () {
  $('#datatable').DataTable();

  $(".deleteData").click(function(){
          let codeProduct = $(this).attr('attr-code');
          $('.codeproduct').text(codeProduct).val(codeProduct);
        });

});

$('#deleteData').click(function () {
   $('#modalDelete').modal('show');
});

$('#functionDelete').click(function () {
    $('#modalDelete').modal('hide');
    swal(
        'Deleted!',
        'Data Promo has been deleted.',
        'success'
        )
});
