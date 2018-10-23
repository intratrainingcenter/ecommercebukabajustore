@extends('frontend.general.master')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		<h2 class="ltext-105 txt-center">
			Blog
		</h2>
	</section>

<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 p-b-80">
					<div class="p-r-45 p-r-0-lg">

						<div class="p-b-63">
							<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
								<img src="{{ asset('storage/imagestory/'.$showstory->foto) }}" alt="IMG-BLOG">
								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center">
										{{ $showstory->created_at->format('d') }}
									</span>
									<span class="stext-109 cl3 txt-center">
                    {{ $showstory->created_at->format('m 20y') }}
									</span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15">
									<a class="ltext-108 cl2 hov-cl1 trans-04">
										{{ $showstory->judul }}
									</a>
								</h4>

								<p class="stext-117 cl6">
                  {!! $showstory->deskripsi !!}
								</p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span>
											<span class="cl4">By</span>
											<span class="cl12 m-l-4 m-r-6">|</span>
                      <span>{{ $showstory->created_by }}</span>
										</span>
									</span>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>


@endsection
