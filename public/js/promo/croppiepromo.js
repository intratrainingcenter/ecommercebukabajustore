$(document).ready(function () {
	var croppiepromo = $('#cropimagepromo').croppie({
		enableExif: true,
		viewport: {
			width: 900,
			height: 400,
			type: 'square'
		},
		boundary: {
			width: 900,
			height: 500
		},
		url:'../../image/free.jpg'
	});

	$('.inputImagepromo').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimagepromo').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					event.preventDefault();
					croppiepromo.croppie('result','base64').then(function (result) {
						$('#cropimagepromo').empty();
						$('input[name="imagePromo"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});