<section class="sec-product bg0 p-t-100 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Store Overview
			</h3>
		</div>
		<!-- Tab01 -->
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item p-b-10">
					<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
				</li>
				<li class="nav-item p-b-10">
					<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content p-t-50">
				<!-- - -->
				<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ asset('frontend/images/product-01.jpg')}}" alt="IMG-PRODUCT">

										<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												Esprit Ruffle Shirt
											</a>

											<span class="stext-105 cl3">
												$16.64
											</span>
										</div>

										<div class="block2-txt-child2 flex-r p-t-3">
											<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
												<img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png') }}" alt="ICON">
												<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png') }}" alt="ICON">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="top-rate" role="tabpanel">
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							@foreach($topRate as $itemRate)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ asset('storage/imageproduct/'.$itemRate->relationproduct->foto) }}" alt="IMG-PRODUCT">

										<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
											Quick View
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $itemRate->relationproduct->nama_barang }}
											</a>

											<span class="stext-105 cl3">
												$ {{ $itemRate->relationproduct->harga_jual }}
											</span>
										</div>

								<div class="block2-txt-child2 flex-r p-t- wishlist">
									@if(Auth::User() != null && Auth::User()->kode_jabatan == 'member')
									<a href="javascript:void(0)" codeproduct="{{ $itemRate->relationproduct->kode_barang }}" class="btn-addwish-b2 dis-block pos-relative
										js-addwish-b2
											@if($cekbarfav = $dataWishlist->where('kode_barang',$itemRate->relationproduct->kode_barang)->isNotEmpty())
											js-addedwish-b2
											@else
											@endif
										">
									@else
									<a href="{{ route('formLoginMember') }}" codeproduct="{{ $itemRate->relationproduct->kode_barang }}" class="btn-addwish-b2 dis-block pos-relative">
									@endif
										<img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
									</a>

								</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>