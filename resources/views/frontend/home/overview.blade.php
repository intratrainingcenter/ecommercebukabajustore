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
							@foreach($bestSeller as $itemSeller)
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="{{ asset('storage/imageproduct/'.$itemSeller->detailProduct->foto) }}" alt="IMG-PRODUCT">

										<a href="{{ route('frontdetailProduct',['id'=>encrypt($itemSeller->detailProduct->id)]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											Detail Product
										</a>
									</div>

									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												{{ $itemSeller->detailProduct->nama_barang }}
											</a>

											<span class="stext-105 cl3">
												$ {{ $itemSeller->detailProduct->harga_jual }}
											</span>
										</div>
									</div>
								</div>
							</div>
							@endforeach
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

										<a href="{{ route('frontdetailProduct',['id'=>encrypt($itemRate->relationproduct->id)]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											Detail Product
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