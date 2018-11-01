$(document).ready(function () {
	$('#datatable').DataTable();
	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);
});

function loaddataslider() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/slider/loaddataslider',
		success:function (data) {
			$('#dataslider').html(data);

		}
	});
}
$(document).on('click','.deleteData',function () {
	let idslider = $(this).attr('attr-id');
	$('#idslider').val(idslider);
	$('#modalDelete').modal('show');
});

$(document).on('click','#functionDelete',function () {
	let idslider = $('#idslider').val();
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'delete',
		url:location.origin+'/slider/deleteslider',
		data:{idslider:idslider},
		success:function (data) {
			loaddataslider();
			$('#modalDelete').modal('hide');
			if(data == 'success'){
				swal(
				'Deleted!',
				'Data slider has been deleted.',
				'success'
				);	
			}
		}
	});	
});