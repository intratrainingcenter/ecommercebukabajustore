	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/notification',
		success:function (data) {
      $('#transaction_pending').text(data.transaction);
      $('#transactionreturn_pending').text(data.transactionReturn);
	  $('#all-notification').text(data.transaction+data.transactionReturn);
		}
	});
