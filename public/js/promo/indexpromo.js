$(document).ready(function () {
  $('#datatable').DataTable();
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