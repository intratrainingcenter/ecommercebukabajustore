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
		@foreach ($datareport as $itemDatareport)
		<form action="{{route('processRetunTransaction')}}" method="post"  class="pull-right">
			{{ csrf_field() }}
			<tr class="table_row">
				<td class="column-1">
					<div class="how-itemcart1">
						<img src="{{ asset('storage/imageproduct/'.$itemDatareport->detailProduct->foto) }}" alt="IMG">
					</div>
				</td>
				<td class="column-2">{{ $itemDatareport->detailProduct->nama_barang }}</td>
				<td class="column-3">$ {{ $itemDatareport->detailProduct->harga_jual }}</td>
				<td class="column-4"></td>
				<td class="column-5">
					<div class="wrap-num-product flex-w m-r-20 m-tb-10">
							<button type="button" class="btn-num-product-down minus{{ $itemDatareport->kode_barang }} cl8 hov-btn3 trans-04 flex-c-m btnminusvalueInput" codeProduct="{{ $itemDatareport->kode_barang }}" attr_qty="{{ $itemDatareport->qty }}" disabled>
								<i class="fs-16 zmdi zmdi-minus"></i>
							</button>
							<input class="mtext-104 cl3 txt-center num-product quantityReturn{{ $itemDatareport->kode_barang }}" type="number" name="quantityReturn[]" value="1" min="1">
								@if($errors->has('quantityReturn')) <div class="form-control-feedback">{{ $errors->first('quantityReturn') }}</div> @endif
							<button type="button" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m plus{{ $itemDatareport->kode_barang }} btnAddvalueInput" codeProduct="{{ $itemDatareport->kode_barang }}" attr_qty="{{ $itemDatareport->qty }}" @if ( $itemDatareport->qty == '1') disabled @endif>
								<i class="fs-16 zmdi zmdi-plus"></i>
							</button>
						</div>
				</td>
				<td class="column-5">
					<textarea name="descriptionreturn[]" rows="6" cols="20" placeholder="return Description" autofocus required></textarea>
				</td>
					<input type="hidden" class="codeTransaction" name="codetransaction" value="{{ $codeTransaction }}">
					<input type="hidden" class="codeTransaction" name="codeproduct[]" value="{{ $itemDatareport->kode_barang }}">
					<input type="hidden" class="codeTransaction" name="priceproduct[]" value="{{ $itemDatareport->detailProduct->harga_jual }}">
		@endforeach
		</tr>
	</table>
</div>
