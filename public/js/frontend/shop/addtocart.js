$(document).ready(function () {
	$(document).on('click','.addProductToCart',function () {
		let nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
		let idProduct	= $(this).attr('attr-id');
		let qtyProduct  = $('.qtyProduct').val();

		$.ajax({
			headers:{
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
			},
			method:'post',
			url:location.origin+"/cart/addtocart",
			data:{
				idProduct:idProduct,qtyProduct:qtyProduct
			},
			success:function (data) {
				if(data == 'success'){
					loadcart();
					swal(nameProduct, "is added to cart !", "success");
				}
			}
		});
	});	
});

function loadcart() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/cart/loaddatacart',
		success:function (data) {
			$('#dataPromo').html(data);
		}
	});
}