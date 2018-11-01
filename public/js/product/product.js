$(document).ready(function () {
  $('#datatable').DataTable();

$('.summernote').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                 // set focus to editable area after initializing summernote
});
});

$(document).on('click','.deleteData',function(){
// $(".deleteData").click(function(){
   $('#modalDelete').modal('show');
        let idProduct = $(this).attr('attr-id');
        $('.idproduct').text(idProduct).val(idProduct);
});

$(document).on('click','.functionDelete',function(){
// $('.functionDelete').click(function () {
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
