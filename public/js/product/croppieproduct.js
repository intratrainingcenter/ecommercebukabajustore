$(document).ready(function () {
	var croppieproduct = $('#cropimageproduct').croppie({
		enableExif: true,
		viewport: {
			width: 400,
			height: 450,
			type: 'square'
		},
		boundary: {
			width: 450,
			height: 500
		},
		url:'../../image/free.jpg'
	});

	$('.inputImageproduct').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageproduct').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					event.preventDefault();
					croppieproduct.croppie('result','base64').then(function (result) {
						$('#cropimageproduct').empty();
						$('input[name="imageProduct"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});
