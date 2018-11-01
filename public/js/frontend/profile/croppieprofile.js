$(document).ready(function () {
	var croppieprofile = $('#cropimageprofile').croppie({
		enableExif: true,
		viewport: {
			width: 200,
			height: 200,
			type: 'square'
		},
		boundary: {
			width: 250,
			height: 250
		},
		url:'../../image/chooseimage2.png'
	});

	$('.inputImageprofile').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageprofile').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button type="button" class="btn btn-success waves-effect waves-light pull-right apply">Apply</button>');
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppieprofile.croppie('result','base64').then(function (result) {
			$('#cropimageprofile').hide();
			$('.accepted').html('<button type="button" class="btn btn-danger waves-effect waves-light pull-right cancel">Cancel</button>');
			$('#resultimage').html('<img src="'+result+'">');
			$('input[name="imageProfile"]').val(result);
		});
	});

	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
		$('#cropimageprofile').show();
		$('.accepted').html('<button type="button" class="btn btn-success waves-effect waves-light pull-right apply">Apply</button>');
		$('#resultimage').html('');
		$('input[name="imageProfile"]').val('');
	});

});
