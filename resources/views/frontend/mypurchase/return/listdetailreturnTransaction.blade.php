<div class="col-md-8 col-lg-9 p-b-80">
	<div class="p-r-45 p-r-0-lg">
		<h3>Detail Return Transaction</h3>
		<hr>
		Code Return<br>
		<h4>{{ $detailretunTransaction->kode_retur }}</h4>
		<br>
		 <div class="row">
			<div class="col-md-4">
				<small>
					Return on<br>
					{{ $detailretunTransaction->created_at }}<br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Status<br>
					@if($detailretunTransaction->status == 'Pending')
						<h5 style="color: orange;"> Pending</h5>
					@elseif($detailretunTransaction->status == 'process')
						<h5 style="color: olive;"> Process</h5>
					@elseif($detailretunTransaction->status == 'received')
						<h5 style="color: blue;"> Received</h5>
					@elseif($detailretunTransaction->status == 'reject')
						<h5 style="color: red;"> Reject</h5>
					@endif
				</small>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<small>
					Grand Total : <br>
					<h5>$ {{ $detailretunTransaction->grandtotal}}</h5><br>
				</small>
			</div>
			<div class="col-md-4" style="">
				<small>
					Cashback : <br>
					<h5>$ {{ $detailretunTransaction->cashback }}</h5><br>
				</small>
			</div>
			<div class="col-md-12" style="">
				<small>
					Reject Description :<br>
					{{ $detailretunTransaction->keterangan }}<br>
				</small>
			</div>
		</div>
		<hr>
		<h5> Product :</h5>
			<div class="wrap-table-shopping-cart">
				<table class="table-shopping-cart">
					<tr class="table_head">
						<th class="column-1">Product</th>
						<th class=""></th>
						<th class="column-3">Quantity Return</th>
						<th class="column-4">Description</th>
						<th class="column-4"></th>
					</tr>
					@foreach($detailretunTransaction->opsiDetailreturn as $itemDetailreturntransaction )
					<tr class="table_row">
						<td class="column-1">
							<div class="how-itemcart1">
								<img src="{{ asset('storage/imageproduct/'.$itemDetailreturntransaction->detailProductreturn->foto ) }}" alt="IMG">
							</div>
						</td>
						<td class="column-3">{{ $itemDetailreturntransaction->detailProductreturn->nama_barang }}</td>
						<td class="column-3">{{ $itemDetailreturntransaction->qty }} Pcs</td>
						<td class="column-4">{{ $itemDetailreturntransaction->keterangan }}</td>
						<td class="column-4"></td>
					</tr>
					@endforeach
				</table>
			</div>
	</div>
	<a href="{{ route('listRetunTransaction') }}">
		<div class="pull-left flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
			Back
		</div>
	</a>
</div>
