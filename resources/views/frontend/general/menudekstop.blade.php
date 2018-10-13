<div class="wrap-menu-desktop">
	<nav class="limiter-menu-desktop p-l-45">
		<!-- Logo desktop -->
		<a href="#" class="logo">
			<img src="{{ asset('frontend/images/icons/logo-01.png') }}" alt="IMG-LOGO">
		</a>
		<!-- Menu desktop -->
		<div class="menu-desktop">
			<ul class="main-menu">
				<li class="@if(@$page == 'home') active-menu @endif">
					<a href="{{ route('fronthomeIndex') }}">Home</a>
				</li>
				<li class="@if(@$page == 'shop') active-menu @endif">
					<a href="{{ route('frontshopIndex') }}">Shop</a>
				</li>

				<li class="label1" data-label1="hot">
					<a href="shoping-cart.html">Features</a>
				</li>

				<li>
					<a href="blog.html">Blog</a>
				</li>

				<li>
					<a href="about.html">About</a>
				</li>

				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>
		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
				<i class="zmdi zmdi-search"></i>
			</div>

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
			<div class="flex-c-m h-full p-lr-19">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
					<i class="zmdi zmdi-menu"></i>
				</div>
			</div>
		</div>
	</nav>
</div>
