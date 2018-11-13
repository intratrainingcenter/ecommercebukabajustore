$(document).ready(function () {
	$('#datatable').DataTable();
	// settimeout for alert after action
	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

// Function for load data position 
function loaddataposition() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/position/loaddataposition',
		success:function (data) {
			$('#dataPosition').html(data);

		}
	});
}

// Function For pop up Modal delete
$(document).on('click','.deleteData',function () {
	let idPosition = $(this).attr('attr-id');
	$('#idPosition').val(idPosition);
	$('#modalDelete').modal('show');
});

// Function For Delete DAta Position
$(document).on('click','#functionDelete',function () {
	let idPosition = $('#idPosition').val();
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'delete',
		url:location.origin+'/position/deleteposition',
		data:{idPosition:idPosition},
		success:function (data) {
			loaddataposition();
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