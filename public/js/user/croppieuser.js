$(document).ready(function () {
	var croppiestory = $('#cropimageuser').croppie({
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
		var img='';
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimageuser').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-success waves-effect pull-right waves-light green apply">Apply</button>');
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});

	$(document).on('click','.apply',function (event) {
		var img='';
		event.preventDefault();
		croppiestory.croppie('result','base64').then(function (result) {
			$('#cropimageuser').hide();
			img +="<img src="+result+" style='display: block;margin-left: auto;margin-right: auto;width: 40%;'>";
			$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green cancel">Cancel</button>');
			$('.imgshow').html(img);
			$('input[name="imageuser"]').val(result);
		});
	});
	//
	$(document).on('click','.cancel',function (event) {
		event.preventDefault();
			$('#cropimageuser').show();
			$('.accepted').html('<button type="button" class="btn btn-large waves-effect pull-right waves-light green apply">Apply</button>');
			$('.imgshow').html('');
			$('input[name="imageuser"]').val('');
	});

});
