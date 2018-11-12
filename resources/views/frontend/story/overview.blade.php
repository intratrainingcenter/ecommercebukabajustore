<section class="bg0 p-t-62 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">

					@foreach($showstory as $story)
					<div class="p-b-63">
						<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
							<img src="{{ asset('storage/imagestory/'.$story->foto) }}" alt="IMG-BLOG">
							<div class="flex-col-c-m size-123 bg9 how-pos5">
								<span class="ltext-107 cl2 txt-center">
									{{ $story->created_at->format('d') }}
								</span>
								<span class="stext-109 cl3 txt-center">
									{{ $story->created_at->format('m 20y') }}
								</span>
							</div>
						</a>

						<div class="p-t-32">
							<h4 class="p-b-15">
								<a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04">
									{{ $story->judul }}
								</a>
							</h4>

							<p class="stext-117 cl6">
								{!! str_limit($story->deskripsi, 50) !!}
							</p>

							<div class="flex-w flex-sb-m p-t-18">
								<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
									<span>
										<span class="cl4">By</span>
										<span class="cl12 m-l-4 m-r-6">|</span>
										<span>{{ $story->created_by }}</span>
									</span>
								</span>
								<a href="{{ route('detailstory',1) }}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
									Continue Reading
									<i class="fa fa-long-arrow-right m-l-9"></i>
								</a>
							</div>
						</div>
					</div>
					@endforeach

					<!-- Pagination -->
					<div class="flex-l-m flex-w w-full p-t-10 m-lr--7">
						{{ $showstory->render() }}
					</div>
				</div>
			</div>

			<div class="col-md-4 col-lg-3 p-b-80">
				<div class="side-menu">

					<div class="p-t-65">
						<h4 class="mtext-112 cl2 p-b-33">
							Newness Products
						</h4>

						<ul>
							@forelse ($newnessproduct as $product)
							<li class="flex-w flex-t p-b-30">
								<a href="{{ route('frontdetailProduct',['id'=>encrypt($product->id)]) }}" class="wrao-pic-w size-214 hov-ovelay1 m-r-20">
									<img src="{{ asset('storage/imageproduct/'.$product->foto) }}" height="112px" alt="PRODUCT">
								</a>

								<div class="size-215 flex-col-t p-t-8">
									<a href="{{ route('frontdetailProduct',['id'=>encrypt($product->id)]) }}" class="stext-116 cl8 hov-cl1 trans-04">
										{{ $product->nama_barang }}
									</a>

									<span class="stext-116 cl6 p-t-20">
										$ {{ $product->harga_jual }}
									</span>
								</div>
							</li>
							@empty
							<strong>Empty</strong>
							@endforelse
						</ul>
					</div>

					<div class="p-t-55">
						<h4 class="mtext-112 cl2 p-b-33">
							Categories
						</h4>
						<ul>
							@forelse($showcategory as $category)
							<li class="bor18">
								<a href="/shop/{{ $category->nama_kategori }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
									{{ $category->nama_kategori }}
								</a>
							</li>
							@empty
							<strong>Empty</strong>
							@endforelse
						</ul>
					</div>

				</div>
			</div>

		</div>
	</div>
</section>
