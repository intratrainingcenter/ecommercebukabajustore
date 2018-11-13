
function countwishlist() {
	$.ajax({
		headers:{
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
		},
		method:'get',
		url:location.origin+'/wishlist/countwishlist/',
		success:function (data) {
			$('.countwishlist').attr('data-notify',data)
		}
	});
}

$( document ).ready(function() {
	countwishlist();
});


$('.js-addwish-b2').on('click', function(e){
	e.preventDefault();
		// call parent / on
		let nameProduct = $(this).parent().parent().find('.js-name-b2').html();
		let idproduct = $(this).attr("codeproduct");

		if($(this).parent().find('.js-addedwish-b2').length == 0) {

			$.ajax({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
				},
				method:'get',
				url:location.origin+'/wishlist/addproduct/'+idproduct,
				success:function (data) {
					swal(nameProduct, "is added to wishlist !", "success");
				}
			});
						// call function
						countwishlist();
						// add class
						$(this).addClass('js-addedwish-b2');

					}else {

						$.ajax({
							headers:{
								'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
							},
							method:'get',
							url:location.origin+'/wishlist/removeproduct/'+idproduct,
							success:function (data) {
								swal(nameProduct, "is removed to wishlist !", "success");
							}
						});
						// call function
						countwishlist();
						// remove class
						$(this).removeClass('js-addedwish-b2');

					}

				});