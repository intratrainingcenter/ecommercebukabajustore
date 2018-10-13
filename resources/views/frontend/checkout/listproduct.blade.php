<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
	<div class="m-l-25 m-r--38 m-lr-0-xl">
		<div class="wrap-table-shopping-cart">
			<table class="table-shopping-cart">
				<tr class="table_head">
					<th class="column-1">Product</th>
					<th class="column-1"></th>
					<th class="column-3">Price</th>
					<th class="column-2">Qty</th>
					<th class="column-5">Total</th>
				</tr>
				@php
				$grandtotal = 0; 
				$weightgood = 0; 
				@endphp
				@foreach($listCart as $itemCart)
				<tr class="table_row">
					<td class="column-1">
						<div class="how-itemcart1">
							<img src="{{ asset('storage/imageproduct/'.$itemCart->detailProduct->foto) }}" alt="IMG">
						</div>
					</td>
					<td class="column-2">{{ $itemCart->detailProduct->nama_barang }}</td>
					<td class="column-3">$ {{ $itemCart->harga }}</td>
					<td class="column-3">{{ $itemCart->qty }}</td>
					<td class="column-5">$ {{ $itemCart->harga * $itemCart->qty }}</td>
				</tr>
				@php $weightgood += $itemCart->detailProduct->berat_barang * $itemCart->qty @endphp
				@php $grandtotal += $itemCart->subtotal @endphp
				@endforeach
			</table>
		</div>

		<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm" style="text-align: right;">
			<div class="size-208">
			</div>

			<div class="size-209">
				<span class="mtext-110 cl2">
					Subtotal : 
				</span>
				<span class="mtext-110 cl2">
					$ {{$grandtotal}}
				</span>
				<input type="hidden" name="weightgood" value="{{ $weightgood }}">
			</div>
		</div>
	</div>
</div>