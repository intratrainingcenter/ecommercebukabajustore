<div class="flex-w flex-sb-m p-b-52">
	<div class="flex-w flex-c-m m-tb-10">
		<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
			<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
			<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
			Filter
		</div>

		<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search btn-search">
			<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
			<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
			Search
		</div>
	</div>

	<!-- Search product -->
	<div class="dis-none panel-search w-full p-t-10 p-b-15">
		<div class="bor8 dis-flex p-l-15">
			<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
				<i class="zmdi zmdi-search"></i>
			</button>

			<input class="mtext-107 cl2 size-114 plh2 p-r-15 searchProduct" type="text" name="search-product" placeholder="Search">
		</div>
	</div>

	<!-- Filter -->
	<div class="dis-none panel-filter w-full p-t-10">
		<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
			<div class="filter-col1 p-r-15 p-b-27">
				<div class="mtext-102 cl2 p-b-15">
					Sort By
				</div>

					<li class="p-b-6">
						<a href="" class="newness filter-link stext-106 trans-04 filter-link-active">
							Newness
						</a>
					</li>

					<li class="p-b-6">
						<a href="" class="popularity filter-link stext-106 trans-04">
							Popularity
						</a>
					</li>

					<li class="p-b-6">
						<a href="" class="averagerating filter-link stext-106 trans-04">
							Average rating
						</a>
					</li>

					<li class="p-b-6">
						<a href="" class="lowtohightprice filter-link stext-106 trans-04">
							Price: Low to High
						</a>
					</li>

					<li class="p-b-6">
						<a href="" class="highttolowprice filter-link stext-106 trans-04">
							Price: High to Low
						</a>
					</li>
				</ul>
			</div>

			<div class="filter-col2 p-r-15 p-b-27">
				<div class="mtext-102 cl2 p-b-15">
					Price
				</div>

				<ul>
					<li class="p-b-6">
						<a href="" class="filter-link stext-106 trans-04 filter-link-active">
							All
						</a>
					</li>

					<li class="p-b-6">
						<label>Minimum Price</label>
						<input class="min" min="0" type="number" name="" value="" style="width:100px">
					</li>

					<li class="p-b-6">
						<label>Maximum Price</label>
						<input class="max" min="0" type="number" name="" value="" style="width:100px">
					</li>

					<li class="p-b-6">
						<a href="" class="rangeprice filter-link stext-106 trans-04">
							Submit
						</a>
					</li>

				</ul>
			</div>
			<div class="filter-col2 p-r-15 p-b-27 col-md-5">
				<div class="mtext-102 cl2 p-b-15">
					Category
				</div>
				<div class="row">

				<div class="col-md-6">
				<ul>
					<li class="p-b-12">
						<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
							All
						</a>
					</li>
				</ul>
			</div>

		@foreach($dataCategory as $Category)
			<div class="col-md-6">
				<ul>
					<li class="p-b-12">
						<a href="javascript:void(0)" id="{{ $Category->kode_kategori }}" class="category filter-link stext-106 trans-04">
							{{ $Category->nama_kategori }}
						</a>
					</li>
				</ul>
			</div>
		@endforeach

			</div>
			</div>
		</div>
	</div>
</div>
