$(document).ready(function (argument) {
		$('.selectCourier').on('change',function () {
		var courierResults = '';
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
				console.log(data);
				// var no = 0;
				// $.each(data,function (key, alls) {
				// 	$.each(alls,function (key,all) {						
				// 		// console.log(all.costs);	
				// 		$.each(all.costs,function (key,inall) {
				// 		no++;
				// 			// 		console.log(kurir);
				// 					// console.log(inall.cost[0].value;
				// 					_courierResults += "<tr>"
				// 					+"<td>"+no+"</td>"
				// 					+"<td>"+ all.name +" "+ inall.service +"</td>"
				// 					+"<td>"+ inall.cost[0].value +"</td>"
				// 					"</tr>";

				// 				})
				// 	})

					
				// })
				// $('#hasilcari').html(_courierResults);
			}

		})
	})
});