$(document).ready(function (argument) {
	$('.selectCourier').on('change',function () {
		var serviceResults = '';
		var destinationCity = $('.destinationCity').val();
		var courier = $('.selectCourier').val();
		$.ajax({
			headers: {
				"X-CSRF-TOKEN" : $('meta[name=csrf-token]').attr('content'),
			},
			method:"get",
			url: location.origin+"/checkout/trackcostshipping",
			data:{
				destinationCity:destinationCity,
				courier:courier,
			},
			success:function (data) {
				serviceResults += '<option> Select Service </option>';
				$.each(data,function (key,courier) {
					$.each(courier.costs,function (key,services) {
						serviceResults += '<option value='+services.service+","+services.cost[0].etd+","+services.cost[0].value+'>'+services.service+" ("+services.cost[0].etd+" Day) Rp "+services.cost[0].value+'</option>'
					});
				});

				$('.selectService').html(serviceResults);
			}

		})
	});

	$('.selectService').on('change', function () {
		var cost = $(this).val();	
		var myarr = cost.split(",");

		var service = myarr[0];	
		var etd = myarr[1];
		var amountshipping = myarr[2];

		amountshipping = amountshipping / 14000;
		if(isNaN(amountshipping)){
			$('.textshippingCost').text(0);
			total = parseInt($('.subTotal').text()) + parseInt(0);
		}else{
			$('.textshippingCost').text(amountshipping.toFixed(2));
			total = parseFloat($('.subTotal').text()) + parseFloat(amountshipping);
		}

		$('.textTotal').text(total.toFixed(2));

	});
});