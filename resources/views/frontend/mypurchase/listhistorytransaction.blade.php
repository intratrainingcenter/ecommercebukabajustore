<div class="col-md-8 col-lg-9 p-b-80">
    <div class="p-r-45 p-r-0-lg">
        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <strong>Payment Success!</strong> Payment was successfully paid.
        </div>
        <?php Session::forget('success');?>
      @elseif (Session('Return'))
        <div class="alert alert-success" role="alert">
            <strong>Return Success!</strong> Return was successfully paid.
        </div>
        <?php Session('Return');?>
        @endif
        <div class="wrap-table-shopping-cart">
            <table class="table-shopping-cart" style="padding: 10px;">
                <thead class="table_head">
                    <th style="padding: 10px;">History Transaction</th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse($historyTransaction as $itemHistoryTransaction)
                    <tr class="table_row" style="margin-top: 0px;">
                        <td style="padding: 15px;">
                            Code Transaction<br>
                            <h4>{{ $itemHistoryTransaction->kode_pemesanan }}</h4>
                            <small>
                                Ordered on<br>
                                {{ $itemHistoryTransaction->updated_at }}
                                @if($itemHistoryTransaction->status == 'pending')
                                <h5 style="color: orange;" class="pull-right"> Pending</h5>
                                @elseif($itemHistoryTransaction->status == 'paid')
                                <h5 style="color: olive;" class="pull-right"> Paid</h5>
                                @elseif($itemHistoryTransaction->status == 'process')
                                <h5 style="color: tomato;" class="pull-right"> Process</h5>
                                @elseif($itemHistoryTransaction->status == 'delivery')
                                <h5 style="color: blue;" class="pull-right"> Delivery</h5>
                                @elseif($itemHistoryTransaction->status == 'received')
                                <h5 style="color: green;" class="pull-right"> Received</h5>
                                @elseif($itemHistoryTransaction->status == 'cancel')
                                <h5 style="color: red;" class="pull-right"> Canceled</h5>
                                @endif
                            </small>
                            <hr>
                            <h5 class="pull-left"> Total</h5>
                            <h5 class="pull-right"> $ {{ $itemHistoryTransaction->grandtotal }}</h5>
                        </td>
                        <td style="padding: 10px;">
                            <a href="{{ route('detailHistoryTransaction',['codeTransaction'=>encrypt($itemHistoryTransaction->kode_pemesanan)]) }}">
                                <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Detail Transaction
                                </div>
                            </a>
                            @if ($itemHistoryTransaction->status == 'received')
                              @if ($itemHistoryTransaction->Return != null)
                                @if ($itemHistoryTransaction->Return->status == 'reject')
                                  <a href="{{ route('RetunTransaction',['codeTransaction'=>encrypt($itemHistoryTransaction->kode_pemesanan)]) }}">
                                      <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" style="background-color: #282828; color: #ECECEC">
                                          Return Transaction
                                      </div>
                                  </a>
                                @endif
                              @else
                                <a href="{{ route('RetunTransaction',['codeTransaction'=>encrypt($itemHistoryTransaction->kode_pemesanan)]) }}">
                                    <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5" style="background-color: #282828; color: #ECECEC">
                                        Return Transaction
                                    </div>
                                </a>
                              @endif
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td style="text-align: center;"> No History Transaction </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
