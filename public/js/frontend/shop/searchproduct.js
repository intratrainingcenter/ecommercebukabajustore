$(document).ready(function () {
	let urlParams = new URLSearchParams(window.location.search);
	let paramSort = urlParams.get('sortby');
	let paramPmin = urlParams.get('pmin');
	
	$('.sortby').removeClass('filter-link-active sortactive');
	if(paramSort == "news"){
		$("button.sortby[attr-sort='"+ paramSort +"']").addClass('filter-link-active sortactive');
	}else if(paramSort == "popularity"){
		$("button.sortby[attr-sort='"+ paramSort +"']").addClass('filter-link-active sortactive');
	}else if(paramSort == "rating"){
		$("button.sortby[attr-sort='"+ paramSort +"']").addClass('filter-link-active sortactive');
	}else if(paramSort == "plow"){
		$("button.sortby[attr-sort='"+ paramSort +"']").addClass('filter-link-active sortactive');
	}else if(paramSort == "phigh"){
		$("button.sortby[attr-sort='"+ paramSort +"']").addClass('filter-link-active sortactive');
	}else{
		$("button.sortby[attr-sort='']").addClass('filter-link-active sortactive');
	}

	$('.filterPrice').removeClass('filter-link-active sortactive');
	if(paramPmin == 1){
		$("button.filterPrice[attr-pmin='"+ paramPmin +"']").addClass('filter-link-active priceactive');
	}else if(paramPmin == 50){
		$("button.filterPrice[attr-pmin='"+ paramPmin +"']").addClass('filter-link-active priceactive');
	}else if(paramPmin == 100){
		$("button.filterPrice[attr-pmin='"+ paramPmin +"']").addClass('filter-link-active priceactive');
	}else if(paramPmin == 150){
		$("button.filterPrice[attr-pmin='"+ paramPmin +"']").addClass('filter-link-active priceactive');
	}else if(paramPmin == 200){
		$("button.filterPrice[attr-pmin='"+ paramPmin +"']").addClass('filter-link-active priceactive');
	}else{
		$("button.filterPrice[attr-pmin='']").addClass('filter-link-active priceactive');
	}
});

// SEARCH PRODUCT
$(".searchProduct").keypress(function(e) {
	if(e.which == 13) {
		querysearch();		
	}
});

function querysearch() {
	let search = $('.searchProduct').val();
	let sortby = $('.sortactive').attr('attr-sort');
	let pmin = $('.priceactive').attr('attr-pmin');
	let pmax = $('.priceactive').attr('attr-pmax');

	keys = encodeURI(['q','pmin','pmax','sortby']);
	values = encodeURI([search,pmin,pmax,sortby]);

	var key = keys.split(',');
	var value = values.split(',');
	var querys = document.location.search.substr(1).split('&');

	for (var e = key.length - 1; e >= 0; e--) {
		querys[e] = [key[e],value[e]].join('=');
	}

	document.location.search = querys.join('&');
}

$(document).on('click','.sortby',function () {
	$('.sortby').removeClass('filter-link-active sortactive');
	$(this).addClass('filter-link-active sortactive')
	querysearch();
});

$(document).on('click','.filterPrice',function () {
	$('.filterPrice').removeClass('filter-link-active priceactive');
	$(this).addClass('filter-link-active priceactive')
	querysearch();
});