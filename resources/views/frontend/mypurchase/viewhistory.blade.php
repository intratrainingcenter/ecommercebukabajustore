<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="container">
        <div class="row">
        @include('frontend.mypurchase.sidemenu')
        @if($page=='history')
        	@include('frontend.mypurchase.listhistorytransaction')
        @elseif($page=='detailhistory')
        	@include('frontend.mypurchase.detailhistory')
        @endif
        </div>
    </div>
</section>
