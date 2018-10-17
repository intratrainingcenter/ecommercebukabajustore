<form class="bg0 p-t-75 p-b-85">
  <div class="container">

			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tbody>
                <tr class="table_head">
									<th class="column-1">Product</th>
                  <th class="column-2"></th>
                  <th class="column-3">Price</th>
                  <th class="column-1"></th>
								</tr>
                @foreach($wishlist as $showwishlist)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
                      <img src="{{ asset('storage/imageproduct/'.$showwishlist->product->foto) }}" alt="IMG-PRODUCT">
										</div>
									</td>
                  <td class="column-2">
                    <a href="{{ route('frontdetailProduct',['id'=>encrypt($showwishlist->product->id)]) }}">
                    {{ $showwishlist->product->nama_barang }}
                    </a>
                  </td>
                  <td class="column-3">$ {{ $showwishlist->product->harga_jual }}</td>
                  <td class="column-3">
                    <div hidden class="block2-txt-child1 flex-col-l">
                      <a class="js-name-b2">{{ $showwishlist->product->nama_barang }}</a>
                    </div>
                    <div class="block2-txt-child2 flex-r p-t- wishlist">
                      <a href="javascript:void(0)" codeproduct="{{ $showwishlist->product->kode_barang }}" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 js-addedwish-b2">
                        <img class="icon-heart1 dis-block trans-04" src="{{ asset('frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
                      </a>
                    </div>
                  </td>

                </tr>
                @endforeach
							</tbody></table>
						</div>

					</div>
				</div>

			</div>
		</div>
	</form>
