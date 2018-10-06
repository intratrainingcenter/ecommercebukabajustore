$(document).ready(function () {
	var croppieabout = $('#cropimageabout').croppie({
		enableExif: true,
		viewport: {
			width: 400,
			height: 450,
			type: 'square'
		},
		boundary: {
				width: 500,
			height: 500
		},
		url:'../../image/free.jpg'
	});

	$('.inputImageabout').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageabout').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					event.preventDefault();
					croppieabout.croppie('result','base64').then(function (result) {
						$('#cropimageabout').empty();
						$('input[name="imageAbout"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});
