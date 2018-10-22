<div class="col-md-8 col-lg-9 p-b-80">
	<div class="p-r-45 p-r-0-lg">
		<h3>Detail Transaction</h3>
		<hr>
		Code Transaction<br>
		<h4>{{ $detailHistoryTransaction->kode_pemesanan }}</h4>
		<br>
		<div class="row">
			<div class="col-md-4">
				<small>
					Ordered on<br>
					{{ $detailHistoryTransaction->tgl_pemesanan }}<br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Received on<br>
					{{ $detailHistoryTransaction->tgl_diterima }}<br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Status<br>
					@if($detailHistoryTransaction->status == 'pending')
						<h5 style="color: orange;"> Pending</h5>
					@elseif($detailHistoryTransaction->status == 'paid')
						<h5 style="color: olive;"> Paid</h5>
					@elseif($detailHistoryTransaction->status == 'process')
						<h5 style="color: tomato;"> Process</h5>
					@elseif($detailHistoryTransaction->status == 'delivery')
						<h5 style="color: blue;"> Delivery</h5>
					@elseif($detailHistoryTransaction->status == 'received')
						<h5 style="color: green;"> Received</h5>
					@elseif($detailHistoryTransaction->status == 'cancel')
						<h5 style="color: red;"> Canceled</h5>
					@endif
				</small>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<small>
					Use promo<br>
					<h5>{{ (!is_null($detailHistoryTransaction->kode_promo))?$detailHistoryTransaction->detailPromo->kode_promo:'-' }}</h5><br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Discount Promo<br>
					{{ (!is_null($detailHistoryTransaction->kode_promo))?"$".$detailHistoryTransaction->detailPromo->diskon:"-" }}<br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Period Promo<br>
					{{ (!is_null($detailHistoryTransaction->kode_promo))?$detailHistoryTransaction->detailPromo->berlaku_awal." - ".$detailHistoryTransaction->detailPromo->berlaku_akhir:"-" }}<br>
				</small>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<small>
					Courier<br>
					<h5>{{ $detailHistoryTransaction->shippingService->kurir }}</h5><br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Shipping Service<br>
					{{ $detailHistoryTransaction->shippingService->jenis_layanan }}<br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Shipping Period<br>
					{{ $detailHistoryTransaction->shippingService->jangka_pengiriman }} Day<br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Shipping Cost<br>
					$ {{ $detailHistoryTransaction->shippingService->tarif / 14000}}<br>
				</small>
			</div>
		</div>
		<br>
		<h5> Shipping address :</h5>
		<p>
			{{ $detailHistoryTransaction->alamat }}
		</p>
		<hr>
		<h5> Information :</h5>
		<p>
			{{ $detailHistoryTransaction->keterangan }}
		</p>
		<hr>
		<!-- Shoping Cart -->
		@include('frontend.mypurchase.datadetailhistory')
	</div>
	<a href="{{ route('mypurchaseIndex') }}">
		<div class="pull-left flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
			Back
		</div>
	</a>
</div>