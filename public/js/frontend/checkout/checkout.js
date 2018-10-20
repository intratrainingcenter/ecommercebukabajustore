$(document).ready(function () {
	loadlistProduct();

	$('.checkPromo').on('click',function () {
		promoCode = $('#promoCode').val();
		if(promoCode != '' ){
			$.ajax({
				headers: {
					"X-CSRF-TOKEN" : $('meta[name=csrf-token]').attr('content'),
				},
				method:"get",
				url: location.origin+"/checkout/checkpromo",
				data:{
					promoCode:promoCode
				},
				success:function (data) {
					if(data == 1){
						$('.messagePromo').attr('style','font-size: 10px; color: green;').text('* Promo is a available');
					}else{
						$('.messagePromo').attr('style','font-size: 10px; color: red;').text('* Promo is a not available');
					}
				}
			})
		}else{
			$('.messagePromo').attr('style','font-size: 10px; color: red;').text('* please enter Code promo');
		}
	});

	$('#promoCode').on('keyup',function () {
		$('.messagePromo').text('');
	});
});

function loadlistProduct() {
	listProduct = '';
	subTotal = 0;
	totalProduct = 0;
	$.ajax({
		headers: {
			"X-CSRF-TOKEN" : $('meta[name=csrf-token]').attr('content'),
		},
		method:"get",
		url: location.origin+"/checkout/loadcheckoutproduct",
		success:function (data) {
			$.each(data,function (key,value) {
				totalProduct++;
				subTotal += value.subtotal;
				listProduct += '<tr class="table_row">'+
				'<td class="column-1">'+
				'<div class="how-itemcart1">'+
				'<img src="'+ location.origin +"/storage/imageproduct/"+ value.detail_product.foto +'" alt="IMG">'+
				'</div>'+
				'</td>'+
				'<td class="column-2">'+ value.detail_product.nama_barang +'</td>'+
				'<td class="column-3">$ '+ value.harga +'</td>'+
				'<td class="column-3"> x '+ value.qty +'</td>'+
				'<td class="column-5">$ '+ value.harga * value.qty  +'</td>'+
				'<td><input type="text" name="information" class="information" placeholder="Enter information ordering"/></td>'
				'</tr>';

			});

			$('#dataProduct').html(listProduct);		
			$('.textSubtotal').text(subTotal.toFixed(2));
			total = parseFloat(subTotal) + parseFloat($('.textshippingCost').text());

			$('.textTotal').text(total.toFixed(2));
			$('.valTotal').val(total.toFixed(2));
			$('.totalProduct').val(totalProduct);

		}

	})
}
