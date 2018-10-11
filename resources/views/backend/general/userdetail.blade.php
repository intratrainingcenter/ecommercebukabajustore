<div class="text-center">
	@if (Auth::user()->avatar)
	<img src="{{ asset('storage/imageuser/'.Auth::user()->avatar) }}" defaultimguser alt="user" class="rounded-circle">
	@else
	<img src="{{ asset('defaultimguser.png') }}" alt="user" class="rounded-circle">
	@endif
</div>
<div class="user-info">
	<h4 class="font-16">  {{ Auth::user()->name }} </h4>
	<span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
</div>
