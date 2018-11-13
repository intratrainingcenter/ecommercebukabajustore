<section class="sec-product bg0 p-t-100 p-b-50">
	<!-- breadcrumb -->
	@include('frontend.checkout.breadcrumb')
	@if ($message = Session::get('error'))
	<div class="alert alert-error" role="alert">
		<strong>Payment Error!</strong> {!! $message !!}
	</div>
	<?php Session::forget('error');?>
	@endif
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				@include('frontend.checkout.listproduct')
				@include('frontend.checkout.formshipping')
			</div>
		</div>
	</div>
</section>