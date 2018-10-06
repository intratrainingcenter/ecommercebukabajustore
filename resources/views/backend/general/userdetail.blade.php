<div class="text-center">
	<img src="{{ asset('storage/imageuser/'.Auth::user()->avatar) }}" alt="" class="rounded-circle">
</div>
<div class="user-info">
	<h4 class="font-16">  {{ Auth::user()->name }} </h4>
	<span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
</div>
