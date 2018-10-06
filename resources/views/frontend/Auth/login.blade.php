@extends('frontend.general.master')
@section('content')
  <section class="bg-img1 txt-center p-lr-15 p-tb-92">
    <h2 class="ltext-105 cl0 txt-center">
    </h2>
  </section>
  <div class="container" style="padding-left:350px;padding-right:350px;">
			<div class="">
				<div class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Login Member
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
							<img class="how-pos4 pointer-none" src="{{asset('frontend/images/icons/icon-email.png')}}" alt="ICON">
						</div>
						<div class="bor8 m-b-30">
              <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Your Password">
						</div>
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Sign In</button>
					</form><br>
          <div class="col-md-12">
            <hr>
            <p style="text-align:center;">Or</p><br>
            <a href="#"><button class="col-12 col-md-6 col-lg-6 m-lr-auto cl0 size-121  bor1 p-lr-15 trans-04" style="background-color:#4272d7;">Facebook</button></a>
            <a href="#"><button class="col-12 col-md-6 col-lg-5 m-lr-auto cl0 size-121 p-lr-15 trans-04 bor1" style="background-color:#fa4521;">  Google  </button></a>
          </div><br>
          <a href="#"><p style="text-align:center;">Create an Account</p></a>
				</div>
			</div>
		</div>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92">
      <h2 class="ltext-105 cl0 txt-center">
      </h2>
    </section>
@endsection
