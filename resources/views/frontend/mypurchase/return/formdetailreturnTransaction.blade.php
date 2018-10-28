<div class="wrap-table-shopping-cart">
	<table class="table-shopping-cart">
		<tr class="table_head">
			<th class="column-1">Product</th>
			<th class=""></th>
			<th class="column-2">Price</th>
			<th class="column-3"></th>
			<th class="column-3">Quantity</th>
			<th class="column-3">Annotation</th>
		</tr>
		<tr class="table_row">
			<td class="column-1">
				<div class="how-itemcart1">
					<img src="{{ asset('storage/imageproduct/'.$datareport->foto) }}" alt="IMG">
				</div>
			</td>
			<td class="column-2">{{ $datareport->nama_barang }}</td>
			<td class="column-3">$ {{ $datareport->harga_jual }}</td>
			<td class="column-4"></td>
			<td class="column-5">
				<div class="wrap-num-product flex-w m-r-20 m-tb-10">
						<button class="btn-num-product-down minus cl8 hov-btn3 trans-04 flex-c-m">
							<i class="fs-16 zmdi zmdi-minus"></i>
						</button>
							<input class="mtext-104 cl3 txt-center num-product qtyProduct quantityReturn" type="number" name="quantityReturn" value="1" min="1">
						<button class="btn-num-product-up plus cl8 hov-btn3 trans-04 flex-c-m">
							<i class="fs-16 zmdi zmdi-plus"></i>
						</button>
					</div>
			</td>
			<td class="column-5">
				<textarea name="descriptionreturn" rows="6" cols="20" placeholder="return Description" autofocus></textarea>
			</td>
			@foreach ($historyTransaction->opsiDetailHistory as $items)
				<input type="hidden" class="quantityProduck" name="quantityProduck" value="{{ $items->qty }}">
			@endforeach
		</tr>
	</table>
</div>
