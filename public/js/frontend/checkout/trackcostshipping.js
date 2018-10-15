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
		
		$('.textshippingCost').text('$'+amountshipping.toFixed(2));

	});
});

function currencyrupiahtodollar(amountney) {
	// NOTE: Sample code uses jQuery to handle jsonp
	
	var access_key = '90e7b0a6f55b67b6b6b90371ced0fcf0';
	var from = 'USD';
	var to = 'EUR';
	var amount = '1';

	$.ajax({

		url: 'https://apilayer.net/api/convert?access_key='+access_key+'&from='+from+'&to='+to+'&amount='+amount,
		dataType: "jsonp",
		success: function(response) {

			if (response.success) {

				alert('1 USD is worth ' + parseFloat(response.rate).toFixed(2) + ' EUR');
			}
		}
	});
	
}