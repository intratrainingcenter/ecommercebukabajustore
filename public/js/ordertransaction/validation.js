$(document).ready(function () {
	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);

	$('.validateProcess').on('click',function () {
		let codeTransaction = $(this).attr('attr-code');
		$('#codeProcess').val(codeTransaction);
		$('#modalProcess').modal('show');
	});

	$('.validateDelivery').on('click',function () {
		let codeTransaction = $(this).attr('attr-code');
		$('#codeDelivery').val(codeTransaction);
		$('#modalDelivery').modal('show');
	});

	$('.validateReceived').on('click',function () {
		let codeTransaction = $(this).attr('attr-code');
		$('#codeReceived').val(codeTransaction);
		$('#modalReceived').modal('show');
	});

});