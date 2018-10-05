$(document).ready(function () {
	var croppieregister = $('#cropimageregister').croppie({
		enableExif: true,
		viewport: {
			width: 250,
			height: 300,
			type: 'square'
		},
		boundary: {
			width: 320,
			height: 400
		},
		url:'../../image/free.jpg'
	});

	$('.inputImageregister').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageregister').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					event.preventDefault();
					croppieregister.croppie('result','base64').then(function (result) {
						$('#cropimageregister').empty();
						$('input[name="imageUser"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});
