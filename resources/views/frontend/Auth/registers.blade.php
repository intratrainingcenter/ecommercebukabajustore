@extends('frontend.general.master')
@section('content')

  <section class="bg-img1 txt-center p-lr-15 p-tb-92">
  </section>
  <div class="container" style="padding-left:350px;padding-right:350px;">
			<div class="">
				<div class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
          <form method="POST"  class="form-horizontal m-t-20" action="{{ route('memberregister') }}">
              @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Register Member
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
              <input id="name" type="text" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus placeholder="User Name">
						</div>
                @if ($errors->has('name'))
                    <span style="color:red;">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            <div class="bor8 m-b-20 how-pos4-parent">
             <input id="email" type="email" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"placeholder="E-mail">
					 </div>
                  @if ($errors->has('email'))
                      <span style="color:red;">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
             <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                <select class="js-select2" name="gender">
                  <option>Select a Gender</option>
                  <option value="Male">Male</option>
                  <option value="female">Female</option>
                </select>
                <div class="dropDownSelect2"></div>
							</div>
                 @if ($errors->has('gender'))
                      <span style="color:red;">
                          <strong>{{ $errors->first('gender') }}</strong>
                      </span>
                  @endif
             <div class="bor8 m-b-20 how-pos4-parent">
             <input  type="Number" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('phonenumber') ? ' is-invalid' : '' }}" name="phonenumber" value="{{ old('phonenumber') }}" placeholder="Phone Number">
					 </div>
                  @if ($errors->has('phonenumber'))
                      <span style="color:red;">
                          <strong>{{ $errors->first('phonenumber') }}</strong>
                      </span>
                  @endif
						<div class="bor8 m-b-30">
              <input id="password" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
						</div>
                  @if ($errors->has('password'))
                      <span style="color:red;">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              <div class="bor8 m-b-30">
              <input id="password-confirm" type="password" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" name="password_confirmation" placeholder="Confirm Password">
            </div>
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">Daftar</button>
					</form><br>
					<a href="/loginMember"><p style="text-align:center;">Already have account?</p></a>
				</div>
			</div>
		</div>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92">
    </section>
@endsection
