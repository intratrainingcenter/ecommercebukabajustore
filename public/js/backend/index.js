	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/notification',
		success:function (data) {
      $('#transaction_pending').text(data[0]);
      $('#transactionreturn_pending').text(data[1]);
	  $('#all-notification').text(data[0]+data[1]);
	  $('#transaction_success').text(data[2]);
	  $('#transaction_return_success').text(data[3]);
	  $('#member').text(data[4]);
	  $('#count_product').text(data[5]);

		}
	});
