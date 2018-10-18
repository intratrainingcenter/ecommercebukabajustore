<section class="sec-product bg0 p-t-100 p-b-50">
	<!-- breadcrumb -->
	@include('frontend.checkout.breadcrumb')
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		 @if ($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container" style="color: green;">
            <span onclick="this.parentElement.style.display='none'"
            class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
        @endif
        @if ($message = Session::get('error'))
        <div class="w3-panel w3-red w3-display-container" style="color:red;">
            <span onclick="this.parentElement.style.display='none'"
            class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('error');?>
        @endif
		<div class="container">
			<div class="row">
				@include('frontend.checkout.listproduct')
				@include('frontend.checkout.formshipping')
			</div>
		</div>
	</div>
</section>