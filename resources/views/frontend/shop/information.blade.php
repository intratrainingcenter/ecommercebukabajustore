<div class="bor10 m-t-50 p-t-43 p-b-40">
	<!-- Tab01 -->
	<div class="tab01">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item p-b-10">
				<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
			</li>

			<li class="nav-item p-b-10">
				<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews ( {{ $dataReview->count() }} )</a>
			</li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content p-t-43">
			<!-- - -->
			<div class="tab-pane fade show active" id="description" role="tabpanel">
				<div class="how-pos2 p-lr-15-md">
					<p class="stext-102 cl6">
						{!! $detailProduct->deskripsi !!}
					</p>
				</div>
			</div>
			<div class="tab-pane fade" id="reviews" role="tabpanel">
				<div class="row">
					<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
						<div class="p-b-30 m-lr-15-sm">
							<!-- Review -->
							@foreach($dataReview as $data)
							<div class="flex-w flex-t p-b-68">
								<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
										
							<img class="rounded-circle" src=@if ($data->relationuser->avatar == null)"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkgjWUXXQEfziJEK2lotHcpB9hXpYSJJtLJfaHWOh78M2XEOka" @elseif($data->relationuser->kode_jabatan == "member" && $data->relationuser->provider_id != null){{$data->relationuser->avatar_original}} @else"{{ asset('storage/imageuser'.'/'.$data->relationuser->avatar) }}"@endif>
								</div>

								<div class="size-207">
									<div class="flex-w flex-sb-m p-b-17">
										<span class="mtext-107 cl2 p-r-20">
											 {{ $data->relationuser->name }}
										</span>

										<span class="fs-18 cl11">
											<div class="col-sm-12 col-lg-12">
													<div class="p-4 text-center">
															<input type="hidden" data-readonly name="rating" class="rating-tooltip" data-filled="mdi mdi-star font-32 text-primary" data-empty="mdi mdi-star-outline font-32 text-muted" value="{{ $data->rating }}"/>
													</div>
											</div>
										</span>
									</div>

									<p class="stext-102 cl6">
										{{ $data->isi_ulasan }}
									</p>
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
