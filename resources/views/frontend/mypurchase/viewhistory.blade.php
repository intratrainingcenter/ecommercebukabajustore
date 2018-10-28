<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="row">
        @include('frontend.mypurchase.sidemenu')
        @if($page=='history')
        	@include('frontend.mypurchase.listhistorytransaction')
        @elseif($page=='detailhistory')
        	@include('frontend.mypurchase.detailhistory')
        @elseif($page=='Return Transaction')
        	@include('frontend.mypurchase.return.returnTransaction')
        @elseif($page=='List Data Return Transaction')
          @include('frontend.mypurchase.return.formreturnTransaction')
        @endif
        </div>
    </div>
</section>
