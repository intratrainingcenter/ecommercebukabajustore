<div class="col-md-4 col-lg-3 p-b-80">
    <div class="side-menu">
        <h4 class="mtext-112 cl2 p-b-33">
            My Purchase
        </h4>
        <ul>
            <li class="bor18">
                <a href="{{ route('mypurchaseIndex') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                    History Transaction
                </a>
            </li>
            <li class="bor18">
                <a href="{{ route('reviewIndex') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                    To review
                </a>
            </li>
            <li class="bor18">
                <a href="{{ route('listRetunTransaction') }}" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4" @if (Session('Return')) style="color: red;"  <?php Session('Return');?> @endif>
                    My Return Transaction
                </a>
            </li>
        </ul>
    </div>
</div>
