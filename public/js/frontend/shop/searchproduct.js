// SEARCH PRODUCT
	$(".searchProduct").keypress(function(e) {
		let search = $('.searchProduct').val();
			if(e.which == 13) {
					if(search == '') {
						e.preventDefault();
					}
				$.ajax({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
					},
					method:'get',
					url:location.origin+'/shop/search='+search,
					success:function (data) {
						alert(window.location.href);
						$('.showsearch').html(data);

					}
				});

	    }
	});

// CATEGORY
	$(".category").click(function(e) {
		e.preventDefault();
		let code_category = $(this).attr('id');
			$.ajax({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
				},
				method:'get',
				url:location.origin+'/shop/?category='+code_category,
				success:function (data) {
					$('.showsearch').html(data);

				}
			});
	});

// SORTBY
	$(".lowtohightprice").click(function(e) {
		e.preventDefault();
				$.ajax({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
					},
					method:'get',
					url:location.origin+'/shop/?sortby=lowtohight',
					success:function (data) {
						$('.showsearch').html(data);

					}
				});
	});

	$(".highttolowprice").click(function(e) {
		e.preventDefault();
				$.ajax({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
					},
					method:'get',
					url:location.origin+'/shop/?sortby=highttolow',
					success:function (data) {
						$('.showsearch').html(data);

					}
				});
	});

	$(".newness").click(function(e) {
		e.preventDefault();
				$.ajax({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
					},
					method:'get',
					url:location.origin+'/shop/?sortby=newness',
					success:function (data) {
						$('.showsearch').html(data);

					}
				});
	});

	$(".averagerating").click(function(e) {
		e.preventDefault();
				$.ajax({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
					},
					method:'get',
					url:location.origin+'/shop/?sortby=averagerating',
					success:function (data) {
						$('.showsearch').html(data);

					}
				});
	});

	$(".popularity").click(function(e) {
		e.preventDefault();
				$.ajax({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
					},
					method:'get',
					url:location.origin+'/shop/?sortby=popularityproduct',
					success:function (data) {
						$('.showsearch').html(data);

					}
				});
	});

// RANGE PRICE
$(".rangeprice").click(function(e) {
	e.preventDefault();
	let min = $('.min').val();
	let max = $('.max').val();
			$.ajax({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
				},
				method:'get',
				url:location.origin+'/shop/?rangeprice='+min+'-'+max,
				success:function (data) {
					$('.showsearch').html(data);

				}
			});
});
