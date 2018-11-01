@extends('frontend.general.master')
@section('content')
  <section class="bg-img1 txt-center p-lr-15 p-tb-92">
    <h2 class="ltext-105 cl0 txt-center">
      Registration Confirmed
    </h2>
  </section>
  <div class="container" style="padding-left:350px;padding-right:350px;">
        <div class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
            Your Email is successfully verified
						</h4>
						<a href="{{ route('formLoginMember') }}"><button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Sign In</button></a>
				</div>
		</div>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92">
      <h2 class="ltext-105 cl0 txt-center">
      </h2>
    </section>
@endsection
