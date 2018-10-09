<div class="top-bar">
	<div class="content-topbar flex-sb-m h-full container">
		<div class="left-top-bar">
			Shipping for Freedom
		</div>
		<div class="right-top-bar flex-w h-full">
			<a href="#" class="flex-c-m trans-04 p-lr-25">
				Track Order
			</a>
			@if(Auth::User() != null)
			<a href="" class="flex-c-m trans-04 p-lr-25">
				Log Out
			</a>
			@else
			<a href="#" class="flex-c-m trans-04 p-lr-25">
				My Account
			</a>
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
