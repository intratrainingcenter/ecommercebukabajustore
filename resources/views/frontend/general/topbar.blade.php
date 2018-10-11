<div class="top-bar">
	<div class="content-topbar flex-sb-m h-full container">
		<div class="left-top-bar">
			Shipping for Freedom
		</div>
		<div class="right-top-bar flex-w h-full">
			@if(Auth::User() != null && Auth::User()->kode_jabatan == 'member')
			<a href="#" class="flex-c-m trans-04 p-lr-25">
				Track Order
			</a>
			<a href="#" class="flex-c-m trans-04 p-lr-25">
				My Account
			</a>
			<a class="flex-c-m trans-04 p-lr-25" href="" onclick="event.preventDefault();
			document.getElementById('logout-form').submit();"> Logout</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			@else
			<a href="loginMember" class="flex-c-m trans-04 p-lr-25">
				Login
			</a>
			<a href="RegisterMember" class="flex-c-m trans-04 p-lr-25">
				Register
			</a>
			@endif
		</div>
	</div>
</div>
