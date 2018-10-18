@extends('frontend.general.master')
@extends('frontend.shop.component.asset')
@section('content')
<section class="sec-product bg0 p-t-100 p-b-50">
	<!-- Product -->
	<div class="container">
		<!-- breadcrumb -->
		@include('frontend.shop.breadcrumb')
		<!-- Product Detail -->
		<section class="sec-product-detail bg0 p-t-65 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="{{ asset('storage/imageproduct/'.$detailProduct->foto) }}">
										<div class="wrap-pic-w pos-relative">
											<img src="{{ asset('storage/imageproduct/'.$detailProduct->foto) }}" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/imageproduct/'.$detailProduct->foto) }}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								{{ $detailProduct->nama_barang }}
							</h4>

							<span class="mtext-106 cl2">
								${{$detailProduct->harga_jual}}
							</span>
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>
											<input class="mtext-104 cl3 txt-center num-product qtyProduct" type="number" name="num-product" value="1">
											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
										@if(Auth::User() != null && Auth::User()->kode_jabatan == 'member')
										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 addProductToCart" attr-id="{{ Request::segment(3) }}">Add to cart</button>
										@else
										<a href="{{ route('formLoginMember') }}">
											<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">Add to cart</button>
										</a>
										@endif

									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div hidden class="block2-txt-child1 flex-col-l">
									<a class="js-name-b2">{{ $detailProduct->nama_barang }}</a>
								</div>
								<div class="block2-txt-child2 flex-r p-t- wishlist">
									@if(Auth::User() != null && Auth::User()->kode_jabatan == 'member')
									<a href="javascript:void(0)" codeproduct="{{ $detailProduct->kode_barang }}" class="btn-addwish-b2 dis-block pos-relative
										js-addwish-b2
											@if($cekbarfav = $dataWishlist->where('kode_barang',$detailProduct->kode_barang)->isNotEmpty())
											js-addedwish-b2
											@else
											@endif
										">
									@else
									<a href="{{ route('formLoginMember') }}" codeproduct="{{ $detailProduct->kode_barang }}" class="btn-addwish-b2 dis-block pos-relative">
									@endif
									<img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
								</a>
							</div> | Add to Wishlist
							</div>
						</div>
					</div>
				</div>
				@include('frontend.shop.information')
			</div>
		</section>
	</div>
</section>
@endsection
