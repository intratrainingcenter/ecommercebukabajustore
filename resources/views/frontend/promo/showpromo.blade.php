<div class="sec-banner bg0 p-t-95 p-b-55">
	<div class="container">
		<div class="row">
      @forelse ($showpromo as $data)
    		<div class="col-md-4 p-b-30 m-lr-auto">
				<div class="block1 wrap-pic-w">
					<img src="{{ asset('storage/imagepromo/'.$data->foto) }}">
					<a href="" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
						<div class="block1-txt-child1 flex-col-l">
							<span class="block1-name ltext-102 trans-04 p-b-8">
                {{ $data->nama_promo }}
							</span>
						</div>
						<div class="block1-txt-child2 p-b-4 trans-05">
							<div class="block1-link stext-101 cl0 trans-09">
								Shop Now
							</div>
						</div>
					</a>
				</div>
        <div class="block2-txt p-t-14">
            <center>
                <span class="stext-105 cl3">
                  Periode Promo <h4> {{ $data->berlaku_awal }} - {{ $data->berlaku_akhir }} </h4>
                  </span>
            </center>
          <hr>
            <div class="row">
              <div class="col-6">
                <center>
                  <span class="stext-105 cl3">
                  Discount <h3> {{ $data->diskon }} % </h3>
                  </span>
              </center>
              </div>
              <div class="col-6">
                <center>
                    <span class="stext-105 cl3">
                    Min purchase <h3> $ {{ $data->min_pembelian }} </h3>
                  </span>
                </center>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-6">
                <br>
                <center>
                  <span class="stext-105 cl3">
                  Code Promo <b> {{ $data->kode_promo }} </b>
                  </span>
              </center>
              </div>
              <div class="col-6">
                <center>
                  <div onclick="copy_codepromo()" id="a" class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4">
                    <input class="code_promo" id="b" type="hidden" name="" value="{{ $data->kode_promo }}">
                   Copy Code Promo
					        </div>
                </center>
              </div>
            </div>
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
