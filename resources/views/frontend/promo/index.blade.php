@extends('frontend.general.master')
@extends('frontend.promo.component.asset')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../../frontend/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Promo
		</h2>
  </section>
  @include('frontend.promo.showpromo')
@endsection
