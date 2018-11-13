$(document).ready(function () {
	$('#datatable').DataTable();
	// Settimeout for alert after action
	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

// Function to disable button space
$('.codePromo').keypress(function( e ) {
	if(e.which === 32)
			return false;
});

// Function to load data promo
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

// Function For pop up Modal delete
$(document).on('click','.deleteData',function () {
	let idPromo = $(this).attr('attr-id');
	$('#idPromo').val(idPromo);
	$('#modalDelete').modal('show');
});

// Function For Delete DAta Position
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
