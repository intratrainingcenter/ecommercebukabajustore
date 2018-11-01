<div class="col-md-8 col-lg-9 p-b-80">
    <div class="p-r-45 p-r-0-lg">
        <div class="wrap-table-shopping-cart">
            <table class="table-shopping-cart" style="padding: 10px;">
                <thead class="table_head">
                    <th style="padding: 10px;">Return Transaction</th>
                    <th></th>
                </thead>
                <tbody>
                    @forelse($returnProduct as $itemreturnProduct)
                    <tr class="table_row" style="margin-top: 0px;">
                        <td style="padding: 15px;">
                            Code Return<br>
                            <h4>{{ $itemreturnProduct->kode_retur }}</h4>
                            <small>
                                Return on<br>
                                {{ $itemreturnProduct->updated_at }}
                                @if($itemreturnProduct->status == 'Pending')
                                <h5 style="color: orange;" class="pull-right"> Pending</h5>
                              @elseif($itemreturnProduct->status == 'process')
                                <h5 style="color: tomato;" class="pull-right"> Process</h5>
                              @elseif($itemreturnProduct->status == 'received')
                                <h5 style="color: green;" class="pull-right"> Received</h5>
                              @elseif($itemreturnProduct->status == 'reject')
                                <h5 style="color: red;" class="pull-right"> Reject</h5>
                                @endif
                            </small>
                            <hr>
                            <h5 class="pull-left"> Total</h5>
                            <h5 class="pull-right"> $ {{ $itemreturnProduct->grandtotal }}</h5>
                        </td>
                        <td>
                          <a href="{{ route('DetailRetunTransaction',['codeReturn'=>encrypt($itemreturnProduct->kode_retur)]) }}">
                              <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                  Detail Return
                              </div>
                          </a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td style="text-align: center;"> No Return Transaction </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
