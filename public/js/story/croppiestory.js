$(document).ready(function () {
	var croppiestory = $('#cropimagestory').croppie({
		enableExif: true,
		viewport: {
			width: 300,
			height: 300,
			type: 'square'
		},
		boundary: {
			width: 400,
			height: 400
		},
		url:'../../image/free.jpg'
	});

	$('.inputImagestory').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimagestory').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-success waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					event.preventDefault();
					croppiestory.croppie('result','base64').then(function (result) {
						$('#cropimagestory').empty();
						$('input[name="imageStory"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});
