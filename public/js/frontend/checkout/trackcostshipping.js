$(document).ready(function (argument) {
	//  Function to get service by destination city and courier
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
				serviceResults += '<option value=""> Select Service </option>';
				// Function loop for data service 
				$.each(data,function (key,courier) {
					$.each(courier.costs,function (key,services) {
						// because the data service has a lot of data, so for that I put a lot of data into one value with the separator
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

		// operation amount shipping to currency dollar by static 
		amountshipping = amountshipping / 14000;

		// condition if amountshipping isNan 
		if(isNaN(amountshipping)){
			$('.textshippingCost').text(0);
			total = parseInt($('.subTotal').text()) + parseInt(0);
		}else{
			$('.textshippingCost').text(amountshipping.toFixed(2)); /** Tofixed(2) is a function that takes 2 numbers behind the point **/
			total = parseFloat($('.subTotal').text()) + parseFloat(amountshipping);
		}

		$('.textTotal').text(total.toFixed(2)); /** Tofixed(2) is a function that takes 2 numbers behind the point **/
		$('.valTotal').val(total.toFixed(2)); /** Tofixed(2) is a function that takes 2 numbers behind the point **/

	});
});