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
					<a href="{{ route('frontshopIndex',['category'=>'all']) }}">Shop</a>
				</li>

				<li class="label1 @if(@$page == 'story') active-menu @endif" data-label1="hot">
					<a href="{{ route('frontstoryIndex') }}">Story</a>
				</li>

				<li class="@if(@$page == 'promo') active-menu @endif">
					<a href="{{ route('frontpromoIndex') }}">Promo</a>
				</li>

				<li class="@if(@$page == 'about') active-menu @endif">
					<a href="{{ route('frontaboutIndex') }}">About</a>
				</li>

				<li>
					<a href="{{route('ContactUs.index')}}">Contact</a>
				</li>
			</ul>
		</div>
		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m">
			@if(Auth::User() != null && Auth::User()->kode_jabatan == 'member')
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart loadCart" data-notify="0">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<a href="{{route('wishlist')}}" class="countwishlist dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
				<i class="zmdi zmdi-favorite-outline"></i>
			</a>
			@endif
			<div class="flex-c-m h-full p-lr-19">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
					<i class="zmdi zmdi-menu"></i>
				</div>
			</div>
		</div>
	</nav>
</div>
