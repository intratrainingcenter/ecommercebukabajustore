<ul class="header-cart-wrapitem w-full">
	@foreach($listCart as $itemCart)
	<li class="header-cart-item flex-w flex-t m-b-12">
		<div class="header-cart-item-img">
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
	@endforeach

</ul>
<div class="w-full">
	<div class="header-cart-total w-full p-tb-40">
		Total: $75.00
	</div>
	<div class="header-cart-buttons flex-w w-full">
		<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
			View Cart
		</a>
		<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
			Check Out
		</a>
	</div>
</div>