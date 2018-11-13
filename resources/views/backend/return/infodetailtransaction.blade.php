<div class="row">
    <div class="col-12">
        <div class="invoice-title">
            <h4 class="pull-right font-16"><strong>Code Return # {{$returntransaction->kode_retur}}</strong></h4>
            <h3 class="m-t-0">
                <img src="{{ asset('storage/imagesetup/'.$setting->foto)}}" alt="logo" height="42"/>
            </h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <address>
                    <strong>Buyer:</strong><br>
                    {{ $returntransaction->userMember->name }}<br>
                    <p>
                    {{ $returntransaction->userMember->alamat }}
                    </p>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <address>
                    <strong>Return On:</strong><br>
                    {{ $returntransaction->tgl_retur }}<br><br>
                </address>
            </div>
            <div class="col-3 text-left">
                <address>
                    <strong>Status:</strong><br>
                    @if($returntransaction->status == 'Pending')
                    <h5 style="color: orange;"> Pending</h5>
                  @elseif($returntransaction->status == 'process')
                    <h5 style="color: tomato;"> Process</h5>
                  @elseif($returntransaction->status == 'received')
                    <h5 style="color: green;"> Received</h5>
                  @elseif($returntransaction->status == 'reject')
                    <h5 style="color: red;"> Reject</h5>
                    @endif <br><br>
                </address>
            </div>
            <div class="col-3">
                <address>
                    <strong>Grand Total:</strong><br>
                    $ {{ $returntransaction->grandtotal }}<br><br>
                </address>
            </div>
            <div class="col-3">
                <address>
                    <strong>Cashback:</strong><br>
                    $ {{ $returntransaction->cashback }}<br><br>
                </address>
            </div>
            <div class="col-12 text-left">
                <address>
                    <strong>Reject Description:</strong><br>
                    {{ $returntransaction->keterangan }}<br><br>
                </address>
            </div>
        </div>
        <hr>
    </div>
</div>
