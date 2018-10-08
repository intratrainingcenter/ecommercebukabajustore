@extends('frontend.general.master')
@section('content')
  <section class="bg-img1 txt-center p-lr-15 p-tb-92">
    <h2 class="ltext-105 cl0 txt-center">
    </h2>
  </section>
  <div class="container" style="padding-left:350px;padding-right:350px;">
			<div class="">
				<div class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
          <form method="POST"  class="form-horizontal m-t-20" action="{{ route('register') }}">
              @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Register Member
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
              <input id="name" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="User Name">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
							<!-- <img class="how-pos4 pointer-none" src="{{asset('frontend/images/icons/user-icon.png')}}" alt="ICON"> -->
						</div>
            <div class="bor8 m-b-20 how-pos4-parent">
             <input id="email" type="email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail">
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              <img class="how-pos4 pointer-none" src="{{asset('frontend/images/icons/icon-email.png')}}" alt="ICON">
            </div>
             <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                <select class="js-select2" name="gender">
                  <option>Select a Gender</option>
                  <option value="Male">Male</option>
                  <option value="female">Female</option>
                </select>
                <div class="dropDownSelect2"></div>
                 @if ($errors->has('gender'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                  @endif
              <img class="how-pos4 pointer-none" src="{{asset('frontend/images/icons/icon-email.png')}}" alt="ICON">
            </div>
             <div class="bor8 m-b-20 how-pos4-parent">
             <input  type="Number" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" required placeholder="Phone Number">
                  @if ($errors->has('phonenumber'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('phonenumber') }}</strong>
                      </span>
                  @endif
              <!-- <img class="how-pos4 pointer-none" src="{{asset('frontend/images/icons/icon-phone.png')}}" alt="ICON"> -->
            </div>
						<div class="bor8 m-b-30">
              <input id="password" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
						</div>
              <div class="bor8 m-b-30">
              <input id="password-confirm" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="password_confirmation" required placeholder="Confirm Password">
            </div>
            <!--  <button class="col-12 col-md-6 col-lg-6 m-lr-auto cl0 size-121  bor1 p-lr-15 trans-04" style="background-color:#B0B0B0;" data-toggle="modal" data-target="#modalcroopie">Choose Image</button><br><br>
             @php
              $input = Form::file('images',['class'=>'inputImageuser']);
            @endphp -->
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Daftar</button>
					</form><br>
          <div class="col-md-12">
            <hr>
            <p style="text-align:center;">Or</p><br>
            <a href="{{ url('/RegisterMember/auth/Facebook') }}"><button class="col-12 col-md-6 col-lg-6 m-lr-auto cl0 size-121  bor1 p-lr-15 trans-04" style="background-color:#4272d7;">Facebook</button></a>
            <a href="{{ url('/RegisterMember/auth/google') }}"><button class="col-12 col-md-6 col-lg-5 m-lr-auto cl0 size-121 p-lr-15 trans-04 bor1" style="background-color:#fa4521;">  Google  </button></a>
          </div><br>
				</div>
			</div>
		</div>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92">
      <h2 class="ltext-105 cl0 txt-center">
      </h2>
    </section>
     {!!Backendhelper::CroopieModal('modalcroopie',$input,'user')!!}
@endsection
