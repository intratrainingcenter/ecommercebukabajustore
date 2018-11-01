
<div class="col-md-8 col-lg-9 p-b-80">
	<div class="p-r-45 p-r-0-lg">
		<h3>List Produck Return</h3>
		<hr>
		<!-- Shoping Cart -->
		@include('frontend.mypurchase.return.formdetailreturnTransaction')
	</div>
	<a href="{{ route('mypurchaseIndex') }}">
		<div class="pull-left flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
			Back
		</div>
	</a>
		<button type="submit" class="pull-right">
			<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" style="background-color: #282828; color: #ECECEC; margin-right:40px;">
				Return
			</div>
		</button>
	</form>
</div>
