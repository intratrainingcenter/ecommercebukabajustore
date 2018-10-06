$(document).ready(function () {
	$('#datatable').DataTable();
});


$(document).on('click','.deleteData',function () {
  let idAbout = $(this).attr('attr-id');
	$('#idAbout').val(idAbout);
	$('#modalDelete').modal('show');
});

$(document).on('click','#functionDelete',function () {
	let idAbout = $('#idAbout').val();
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'delete',
		url:location.origin+'/about/deleteabout',
		data:{idAbout:idAbout},
		success:function (data) {
			loaddataabout();
			$('#modalDelete').modal('hide');
			if(data == 'success'){
				swal(
				'Deleted!',
				'Data About has been deleted.',
				'success'
				);
			}
		}
	});
});

function loaddataabout() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/about/tabledataabout',
		success:function (data) {
			$('#dataAbout').html(data);

		}
	});
}
