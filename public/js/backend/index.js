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
		}
	});
