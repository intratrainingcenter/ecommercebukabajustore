$(document).ready(function () {
	sumProduct();	
});

$(document).on('click','.loadCart',function () {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/cart/loadcart',
		success:function (data) {
			$('.listSidecart').html(data);
			sumProduct();
		}
	});
});

function sumProduct() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/cart/sumproduct',
		success:function (data) {
			$('.loadCart').attr('data-notify',data.amountProduct);
		}
	});
}