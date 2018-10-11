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
		var img='';
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#cropimagestory').croppie('bind', {
				url: e.target.result
			}).then(function () {
				$('.accepted').html('<button class="btn btn-success waves-effect pull-right waves-light green apply">Apply</button>');
				$('.apply').click(function (event) {
					$('#modalcroopie').modal('hide');
					event.preventDefault();
					croppiestory.croppie('result','base64').then(function (result) {
						img +="<img src="+result+" style='display: block;margin-left: auto;margin-right: auto;width: 40%;'>";
						$('#cropimagestory').empty();
						$('.imgshow').html(img);
						$('input[name="imagestory"]').val(result);
					});
				});
			});
		};
		reader.readAsDataURL($(this).get(0).files[0]);
	});


});
