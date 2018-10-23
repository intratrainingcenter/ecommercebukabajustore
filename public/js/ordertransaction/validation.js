$(document).ready(function () {
	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);

	$('.validateProcess').on('click',function () {
		let codeTransaction = $(this).attr('attr-code');
		$('#codeProcess').val(codeTransaction);
		$('#modalProcess').modal('show');
	})
});