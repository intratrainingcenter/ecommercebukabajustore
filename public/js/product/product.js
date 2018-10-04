$(document).ready(function () {
  $('#datatable').DataTable();

  $(".deleteData").click(function(){
     $('#modalDelete').modal('show');
          let idProduct = $(this).attr('attr-id');
          $('.idproduct').text(idProduct).val(idProduct);
        });
});

$('.functionDelete').click(function () {
    $('#modalDelete').modal('hide');
    swal(
        'Deleted!',
        'Data Promo has been deleted.',
        'success'
        )
});

function loaddataproduct() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/product/loaddataproduct',
		success:function (data) {
			$('#dataProduct').html(data);
		}
	});
}

$(document).on('click','.functionDelete',function (e) {
  let idproduct = $('.idproduct').val();
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'delete',
		url:location.origin+'/product/deleteproduct',
		data:{idProduct:idproduct},
		success:function (data) {
			loaddataproduct();
			$('#modalDelete').modal('hide');
			if(data == 'success'){
				swal(
				'Deleted!',
				'Data Promo has been deleted.',
				'success'
				);
			}
		}
	});
});
