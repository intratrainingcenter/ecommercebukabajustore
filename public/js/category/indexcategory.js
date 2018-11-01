$(document).ready(function () {
	$('#datatable').DataTable();
	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

function loaddatacategory() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/category/loaddatacategory',
		success:function (data) {
			$('#dataCategory').html(data);

		}
	});
}
$(document).on('click','.deleteData',function () {
	let idCategory = $(this).attr('attr-id');
	$('#idCategory').val(idCategory);
	$('#modalDelete').modal('show');
});

$(document).on('click','#functionDelete',function () {
	let idCategory = $('#idCategory').val();
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'delete',
		url:location.origin+'/category/deletecategory',
		data:{idCategory:idCategory},
		success:function (data) {
			loaddatacategory();
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
