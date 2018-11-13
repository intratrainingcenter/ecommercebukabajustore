$(document).ready(function () {
	var croppieuser = $('#cropimageuser').croppie({
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
		url:'../../image/chooseimage2.png'
	});

	$('.inputImageuser').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageuser').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');

			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppieuser.croppie('result','base64').then(function (result) {
			$('#cropimageuser').hide();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('#showimageuser').html('<img src="'+result+'">');
			$('input[name="imageUser"]').val(result);
		});
	});

	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
			$('#cropimageuser').show();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			$('#showimageuser').html('');
			$('input[name="imageUser"]').val('');
		});

});
