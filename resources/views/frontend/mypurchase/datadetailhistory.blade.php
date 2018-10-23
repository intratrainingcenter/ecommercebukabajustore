<div class="wrap-table-shopping-cart">
	<table class="table-shopping-cart">
		<tr class="table_head">
			<th class="column-1">Product</th>
			<th class="column-2"></th>
			<th class="column-3">Price</th>
			<th class="column-4">Quantity</th>
			<th class="column-5">Annotation</th>
			<th class="column-5">Subtotal</th>
		</tr>
		@php
			$subtotal = 0;
		@endphp
		@foreach($detailHistoryTransaction->opsiDetailHistory as $itemDetailHistory )
		<tr class="table_row">
			<td class="column-1">
				<div class="how-itemcart1">
					<img src="{{ asset('storage/imageproduct/'.$itemDetailHistory->detailProduct->foto) }}" alt="IMG">
				</div>
			</td>
			<td class="column-2">{{ $itemDetailHistory->detailProduct->nama_barang }}</td>
			<td class="column-3">$ {{ $itemDetailHistory->harga }}</td>
			<td class="column-4">{{ $itemDetailHistory->qty }}</td>
			<td class="column-5">{{ $itemDetailHistory->keterangan }}</td>
			<td class="column-5">$ {{ $itemDetailHistory->subtotal }}</td>
		</tr>
		@php
			$subtotal += $itemDetailHistory->subtotal;
		@endphp
		@endforeach
		<tr>
			<td colspan="5" style="text-align: right;">
				Total :
				<hr>
				Cost Shipping :<br>
				Discount :
				<hr>
				Grandtotal :<br>
			</td>
			<td  style="padding: 10px;">
				$ {{ $subtotal }}
				<hr>
				$ {{ $detailHistoryTransaction->shippingService->tarif / 14000 }}<br>
				{{ (!is_null($detailHistoryTransaction->kode_promo))?"$ ".$detailHistoryTransaction->detailPromo->diskon:"-" }}
				<hr>
				$ {{ $detailHistoryTransaction->grandtotal - $detailHistoryTransaction->diskon }}<br>
			</td>
		</tr>
	</table>
</div>