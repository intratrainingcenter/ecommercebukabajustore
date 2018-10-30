<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="{{ Route('frontshopIndex',['category'=>'all']) }}" class="stext-109 cl8 hov-cl1 trans-04">
			Shop
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="{{ Route('frontshopIndex',['category'=>$detailProduct->category->nama_kategori]) }}" class="stext-109 cl8 hov-cl1 trans-04">
			{{ $detailProduct->category->nama_kategori }}
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			{{ $detailProduct->nama_barang }}
		</span>
	</div>
</div>