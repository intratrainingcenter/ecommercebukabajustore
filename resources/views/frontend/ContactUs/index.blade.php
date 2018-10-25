@extends('frontend.general.master')
@section('content')
<section class="sec-product bg0 p-t-100 p-b-50">
    <!-- Product -->
    @if($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{$message}}</p>
        </div>
        @endif
        @if($message = Session::get('warning'))
        <div class="alert alert-danger">
          <p>{{$message}}</p>
        </div>
        @endif
        @if($message = Session::get('danger'))
        <div class="alert alert-warning">
          <p>{{$message}}</p>
        </div>
        @endif

	<div class="container">
  <section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="{{route('ContactUs.store')}}" method="POST">
            @csrf
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Send Us A Message
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Masukkan Email Anda">
              <img class="how-pos4 pointer-none" src="{{asset('image/icons/icon-email.png')}}" alt="ICON">
						</div>
						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="pesan" placeholder="Apa Yang Bisa Kami Bantu?"></textarea>
						</div>
						<input class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
							
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
							
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<a href="" class="" data-cfemail="f4979b9a80959780b4918c9599849891da979b99">kokoali2606@gmail.com</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
    </div>
</section>
@endsection