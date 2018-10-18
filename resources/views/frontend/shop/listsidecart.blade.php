<ul class="header-cart-wrapitem w-full">
	@php
		$grandtotal = 0; 
	@endphp
	@foreach($listCart as $itemCart)
	<li class="header-cart-item flex-w flex-t m-b-12">
		<div class="header-cart-item-img removeProductFromCart" attr-code="{{ encrypt($itemCart->kode_barang) }}">
			<img src="{{ asset('storage/imageproduct/'.$itemCart->detailProduct->foto) }}" alt="IMG">
		</div>
		<div class="header-cart-item-txt p-t-8">
			<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
				{{ $itemCart->detailProduct->nama_barang }}
			</a>

			<span class="header-cart-item-info">
				{{ $itemCart->qty }} x ${{$itemCart->harga}}
			</span>
		</div>
	</li>
	@php $grandtotal += $itemCart->subtotal @endphp
	@endforeach

</ul>
<div class="w-full">
	<div class="header-cart-total w-full p-tb-40">
		Total: ${{ $grandtotal }}
	</div>
	<div class="header-cart-buttons flex-w w-full">
		<a href="javascript:void(0)" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10 clearCart">
			Clear Cart
		</a>
		<a href="{{ route('checkoutIndex') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
			Check Out
		</a>
	</div>
</div>