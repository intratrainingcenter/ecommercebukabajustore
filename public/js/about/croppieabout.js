$(document).ready(function () {
	var croppieabout = $('#cropimageabout').croppie({
		enableExif: true,
		viewport: {
			width: 300,
			height: 350,
			type: 'square'
		},
		boundary: {
				width: 400,
			height: 400
		},
		url:'../../image/chooseimage2.png'
	});

	$('.inputImageabout').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageabout').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$('.apply').click(function (event) {

	});

	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppieabout.croppie('result','base64').then(function (result) {
			$('#cropimageabout').hide();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('#showimageabout').html('<h4 class="mt-0 header-title">&nbsp;</h4> <img src="'+result+'">');
			$('input[name="imageAbout"]').val(result);
		});
	});

	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
			$('#cropimageabout').show();
			$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			$('#showimageabout').html('');
			$('input[name="imageAbout"]').val('');
		});

});
