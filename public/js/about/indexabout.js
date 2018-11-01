$(document).ready(function () {
	$('#datatable').DataTable();

	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);

	$('.summernote').summernote({
	    height: 300,                 // set editor height
	    minHeight: null,             // set minimum height of editor
	    maxHeight: null,             // set maximum height of editor
	    focus: true                 // set focus to editable area after initializing summernote
	});

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
