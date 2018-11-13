$(document).ready(function () {
	// Function to setup implementation croppie function
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
		url:'../../image/chooseimage2.png'
	});

	// Function to get image
	$('.inputImagepromo').change(function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimagepromo').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	// Function To apply image and encode image to base64
	$(document).on('click','.apply',function (event) {
		event.preventDefault();
		croppiepromo.croppie('result','base64').then(function (result) {
			$('#cropimagepromo').hide();
			$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('input[name="imagePromo"]').val(result);
		});
	});

	// function cancel image 
	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
		$('#cropimagepromo').show();
		$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
		$('input[name="imagePromo"]').val('');
	});


});