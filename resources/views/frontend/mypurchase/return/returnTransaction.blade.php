
<div class="col-md-8 col-lg-9 p-b-80">
	<div class="p-r-45 p-r-0-lg">
		<h3>	Return Transaction</h3>
		<hr>
		<!-- Shoping Cart -->
		@include('frontend.mypurchase.return.detailreturnTransaction')
	</div>
	<a href="{{ route('mypurchaseIndex') }}">
		<div class="pull-left flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
			Back
		</div>
	</a>
	<form action="{{ route('FormRetunTransaction')}}" method="post" class="pull-right next_return">
		{{ csrf_field() }}
		<button type="submit">
			<div class="pull-right flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" style="background-color: #282828; color: #ECECEC; margin-right:40px;">
				Next Return
			</div>
		</button>
		<input type="hidden" name="productId" class="productId">
		<input type="hidden" name="transactionId" class="transactionId">
</form>
</div>
