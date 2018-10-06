$(document).ready(function () {
	var croppiesetup = $('#cropimagesetup').croppie({
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
		url:'../../image/free.jpg'
	});

	$('.inputImagesetup').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimagesetup').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppiesetup.croppie('result','base64').then(function (result) {
			$('#cropimagesetup').hide();
			$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('#imageweb').html('<img src="'+result+'">');
			$('input[name="imageSetup"]').val(result);
		});
	});

	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
			$('#cropimagesetup').show();
			$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			$('#imageweb').html('');
			$('input[name="imageSetup"]').val('');
	});

});