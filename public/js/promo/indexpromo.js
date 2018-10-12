$(document).ready(function () {
	$('#datatable').DataTable();
});

function loaddatapromo() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/promo/loaddatapromo',
		success:function (data) {
			$('#dataPromo').html(data);

		}
	});
}
$(document).on('click','.deleteData',function () {
	let idPromo = $(this).attr('attr-id');
	$('#idPromo').val(idPromo);
	$('#modalDelete').modal('show');
});

$(document).on('click','#functionDelete',function () {
	let idPromo = $('#idPromo').val();
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'delete',
		url:location.origin+'/promo/deletepromo',
		data:{idPromo:idPromo},
		success:function (data) {
			loaddatapromo();
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
