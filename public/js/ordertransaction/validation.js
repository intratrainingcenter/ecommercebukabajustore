$(document).ready(function () {

	setTimeout(function(){ $('.alert-success').hide(1000); }, 5000);

	$('.summernote').summernote({
	    placeholder: 'enter the explanation why it was canceled',                 // set Placeholder
	    height: 200,                 // set editor height
	    minHeight: null,             // set minimum height of editor
	    maxHeight: null,             // set maximum height of editor
	    toolbar: false,
	    autofocus: true                 // set focus to editable area after initializing summernote
	});

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

	$('.validateCancel').on('click',function () {
		let codeTransaction = $(this).attr('attr-code');
		$('#codeCancel').val(codeTransaction);
		$('#modalCancel').modal('show');
	});

});