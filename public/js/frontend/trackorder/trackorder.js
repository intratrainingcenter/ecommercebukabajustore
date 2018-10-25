$(document).ready(function () {
	$('.functionTrackOrder').on('click',function () {
		let codeTransaction = $('.codeTransaction').val();
		if(codeTransaction){
			$.ajax({
				headers:{
					"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content'),
				},
				method:"get",
				url:location.origin+"/trackorder/tracking",
				data:{
					codeTransaction:codeTransaction
				},
				success:function (data) {
					$('.trackResult').html(data);
				}
			});
		}else{
			$('.messageTracking').attr('style','margin-left:30px;font-size: 10px; color: red;').text('* please enter code transaction');
		}
	});

	$('.codeTransaction').on('keyup',function () {
		$('.messageTracking').text('');
	});
});