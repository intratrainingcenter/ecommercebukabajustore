@extends('frontend.general.master')
@section('content')
  <section class="bg-img1 txt-center p-lr-15 p-tb-92">
    <h2 class="ltext-105 cl0 txt-center">
    </h2>
  </section>
  <div class="container" style="padding-left:350px;padding-right:350px;">
      <div class="">
        <div class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Reset Password
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
              <input id="email" type="email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter Your Email">
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
						</div>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input id="password" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="" required placeholder="Password" >
              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>

            <div class="bor8 m-b-20 how-pos4-parent">
              <input id="password-confirm" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="Confirm Password">
            </div>

						<button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Reset Password</button>
          </form>
          <br>
				</div>
			</div>
		</div>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92">
      <h2 class="ltext-105 cl0 txt-center">
      </h2>
    </section>
@endsection
