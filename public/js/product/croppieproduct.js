$(document).ready(function () {
	var croppieproduct = $('#cropimageproduct').croppie({
		enableExif: true,
		viewport: {
			width: 270,
			height: 335,
			type: 'square'
		},
		boundary: {
			width: 400,
			height: 400
		},
		url:'../../image/chooseimage2.png'
	});

	$('.inputImageproduct').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageproduct').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppieproduct.croppie('result','base64').then(function (result) {
			$('#cropimageproduct').hide();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('#showimageproduct').html('<h4 class="mt-0 header-title">&nbsp;</h4> <img src="'+result+'">');
			$('input[name="imageProduct"]').val(result);
		});
	});

	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
			$('#cropimageproduct').show();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			$('#showimageproduct').html('');
			$('input[name="imageProduct"]').val('');
		});

});
