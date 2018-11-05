<footer class="bg3 p-t-75 p-b-32">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">Main menu</h4>
				<ul>
					<li class="p-b-10">
						<a href="{{ route('fronthomeIndex') }}" class="stext-107 cl7 hov-cl1 trans-04">
							Home
						</a>
					</li>
					<li class="p-b-10">
						<a href="{{ route('frontshopIndex',['category'=>'all']) }}" class="stext-107 cl7 hov-cl1 trans-04">
							Shop
						</a>
					</li>
					<li class="p-b-10">
						<a href="{{ route('frontstoryIndex') }}" class="stext-107 cl7 hov-cl1 trans-04">
							Story
						</a>
					</li>
					<li class="p-b-10">
						<a href="{{ route('frontaboutIndex') }}" class="stext-107 cl7 hov-cl1 trans-04">
							About
						</a>
					</li>
					<li class="p-b-10">
						<a href="{{route('ContactUs.index')}}" class="stext-107 cl7 hov-cl1 trans-04">
							Contact
						</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">Categories</h4>
				<ul class="setCategory"></ul>
			</div>
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					Help
				</h4>
				<ul>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Track Order
						</a>
					</li>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Returns 
						</a>
					</li>
					<li class="p-b-10">
						<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
							Shipping
						</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-6 col-lg-3 p-b-50">
				<h4 class="stext-301 cl0 p-b-30">
					GET IN TOUCH
				</h4>
				<p class="stext-107 cl7 size-201">
					Any questions? Let us know in store at<br>
					<p class="stext-107 cl7 size-201 address" ></p><p class="stext-107 cl7 size-201 contactUs" ></p>
				</p>
				<div class="p-t-27">
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-instagram"></i>
					</a>
					<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
						<i class="fa fa-pinterest-p"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="p-t-40">
			<div class="flex-c-m flex-w p-b-18">
				<a href="#" class="m-all-1">
					<img src="{{ asset('frontend/images/icons/icon-pay-01.png') }}" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="{{ asset('frontend/images/icons/icon-pay-02.png') }}" alt="ICON-PAY">
				</a>

				<a href="#" class="m-all-1">
					<img src="{{ asset('frontend/images/icons/icon-pay-03.png') }}" alt="ICON-PAY">
				</a>
			</div>
			<p class="stext-107 cl6 txt-center">
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
			</p>
		</div>
	</div>
</footer>