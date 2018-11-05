<div class="sec-banner bg0 p-t-95 p-b-55">
	<div class="container">
		<div class="row">
      @forelse ($showpromo as $data)
    		<div class="col-md-4 p-b-30">
					<div class="block1 wrap-pic-w">
					<img src="{{ asset('storage/imagepromo/'.$data->foto) }}">
					<a href="javascript:void(0)" class="flex-col-l-sb p-lr-10 p-tb-10">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name mtext-102 trans-04 p-b-8">
                {{ $data->nama_promo }}
							</span>
						</div>
						<center>
						<div class="block2-txt">
							<div class="row">
								<div class="col-2">
									<i class="zmdi block1-name zmdi-time-countdown zmdi-hc-lg"></i>
								</div>
									<span class="stext-105 cl3">
	                Periode Promo <br> <b> {{ date('d-m-Y', strtotime($data->berlaku_awal)) }} - {{ date('d-m-Y', strtotime($data->berlaku_akhir)) }} </b>
									</span>
						</div>
		          <hr>
		            <div class="row">
									<div class="col-2">
										<i class="zmdi block1-name zmdi-money-box zmdi-hc-lg"></i>
									</div>
										<span class="stext-105 cl3">
											Min purchase <br> <b> $ {{ $data->min_pembelian }} </b>
										</span>

										<div class="col-2">
											<i class="zmdi block1-name zmdi-label zmdi-hc-lg"></i>
										</div>
		                  <span class="stext-105 cl3">
		                  Discount <br> <b> $ {{ $data->diskon }} </b>
		                  </span>
								</div>
		            <br>
		            <div class="row">
		              <div class="col-12">
										<center>
											<input class="txt-center stext-104 cl2 size-117 bor13" id="copyCode{{ $data->kode_promo }}" type="text" value="{{ $data->kode_promo }}" readonly>
											<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" onclick="copyCode('{{ $data->kode_promo }}')">
												Copy Code
											</div>
									</center>
		              </div>
		            </div>
		        </div>
						<center>
					</a>
				</div>
      </div>
      @empty
      <center>
      <h1> Empty Promo </h1>
      </center>
      @endforelse
		</div>
	</div>
</div>
