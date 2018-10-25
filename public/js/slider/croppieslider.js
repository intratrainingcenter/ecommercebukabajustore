$(document).ready(function () {
	var croppieslider = $('#cropimageslider').croppie({
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
		url:'../../image/chooseimage2.png'
	});

	$('.inputImageslider').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageslider').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					event.preventDefault();
					croppieslider.croppie('result','base64').then(function (result) {
						$('#cropimageslider').empty();
						$('input[name="imageslider"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});