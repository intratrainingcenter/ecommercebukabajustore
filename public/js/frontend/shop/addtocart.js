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
				$('.loadCart').attr('data-notify',data.amountProduct);
				if(data.response == 'success'){
					swal(nameProduct, "is added to cart !", "success");
				}
			}
		});
	});

	$(document).on('click','.removeProductFromCart',function () {
		let nameProduct = $(this).parent().find('.header-cart-item-name').html();
		var codeProduct	= $(this).attr('attr-code');
		$.ajax({
			headers:{
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
			},
			method:'delete',
			url:location.origin+"/cart/removefromcart",
			data:{
				codeProduct:codeProduct
			},
			success:function (data) {
				$('.loadCart').attr('data-notify',data.amountProduct);
				if(data.response == 'success'){
					loadCart();
					swal(nameProduct, "is Remove From cart !", "success");
				}
				
				var locationpath = window.location.pathname;
				locationpath = locationpath.split('/') ;
				if(locationpath[1] === 'checkout'){
					location.reload();
				}
			}
		});
	});

	$(document).on('click','.clearCart',function () {
		$.ajax({
			headers:{
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
			},
			method:'delete',
			url:location.origin+"/cart/clearcart",
			success:function (data) {
				$('.loadCart').attr('data-notify',data.amountProduct);
				if(data.response == 'success'){
					loadCart();
					swal('Cart', "is cart has been Clear !", "success");
				}
			}
		});
	});


});

function loadCart() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/cart/loadcart',
		success:function (data) {
			$('.listSidecart').html(data);
		}
	});
}