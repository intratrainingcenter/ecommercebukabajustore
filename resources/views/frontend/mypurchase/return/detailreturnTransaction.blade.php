<div class="wrap-table-shopping-cart">
	<table class="table-shopping-cart">
		<tr class="table_head">
			<th class="column-1">
				<input type="checkbox" name="checkbox" value="">
			</th>
			<th class="column-2">Product</th>
			<th class=""></th>
			<th class="column-3">Quantity</th>
			<th class="column-4">Price</th>
			<th class="column-4"></th>
		</tr>
		@foreach($detailHistoryTransaction->opsiDetailHistory as $itemDetailHistory )
		<tr class="table_row">
			<td class="column-1">
				<input type="checkbox" name="idProduck" class="idProduck" value="{{ $itemDetailHistory->kode_barang}}">
				<input type="hidden" name="idtransaction" class="idtransaction" value="{{ $itemDetailHistory->kode_pemesanan}}">
			</td>
			<td class="column-2">
				<div class="how-itemcart1">
					<img src="{{ asset('storage/imageproduct/'.$itemDetailHistory->detailProduct->foto) }}" alt="IMG">
				</div>
			</td>
			<td class="column-3">{{ $itemDetailHistory->detailProduct->nama_barang }}</td>
			<td class="column-3">{{ $itemDetailHistory->qty }} Pcs</td>
			<td class="column-4">$ {{ $itemDetailHistory->harga }}</td>
			<td class="column-4"></td>
		</tr>
		@endforeach
	</table>
</div>
