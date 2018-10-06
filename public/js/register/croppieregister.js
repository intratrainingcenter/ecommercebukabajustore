$(document).ready(function () {
	var croppieregister = $('#cropimageregister').croppie({
		enableExif: true,
		viewport: {
			width: 250,
			height: 250,
			type: 'square'
		},
		boundary: {
			width: 320,
			height: 320
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
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppieregister.croppie('result','base64').then(function (result) {
			$('#cropimageregister').hide();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('#showimageregister').html('<img src="'+result+'">');
			$('input[name="imageUser"]').val(result);
		});
	});

	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
			$('#cropimageregister').show();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			$('#showimageregister').html('');
			$('input[name="imageUser"]').val('');
		});

});
