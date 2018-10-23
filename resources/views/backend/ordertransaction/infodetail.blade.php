<div class="row">
    <div class="col-12">
        <div class="invoice-title">
            <h4 class="pull-right font-16"><strong>Code Transaction # {{$detailOrder->kode_pemesanan}}</strong></h4>
            <h3 class="m-t-0">
                <img src="{{ asset('backend/assets/images/logo.png')}}" alt="logo" height="42"/>
            </h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <address>
                    <strong>Buyer:</strong><br>
                    {{ $detailOrder->detailUser->name }}<br>
                    <p>
                        {{ $detailOrder->detailUser->alamat }}
                    </p>
                </address>
            </div>
            <div class="col-6 text-right">
                <address>
                    <strong>Shipped To:</strong><br>
                    <p>{{ $detailOrder->alamat }}</p>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <address>
                    <strong>Order On:</strong><br>
                    {{ $detailOrder->tgl_pemesanan }}<br><br>
                </address>
            </div>
            <div class="col-3">
                <address>
                    <strong>Received On:</strong><br>
                    {{ $detailOrder->tgl_diterima }}<br><br>
                </address>
            </div>
            <div class="col-4 text-right">
                <address>
                    <strong>Status:</strong><br>
                    @if($detailOrder->status == 'pending')
                    <h5 style="color: orange;"> Pending</h5>
                    @elseif($detailOrder->status == 'paid')
                    <h5 style="color: olive;"> Paid</h5>
                    @elseif($detailOrder->status == 'process')
                    <h5 style="color: tomato;"> Process</h5>
                    @elseif($detailOrder->status == 'delivery')
                    <h5 style="color: blue;"> Delivery</h5>
                    @elseif($detailOrder->status == 'received')
                    <h5 style="color: green;"> Received</h5>
                    @elseif($detailOrder->status == 'cancel')
                    <h5 style="color: red;"> Canceled</h5>
                    @endif <br><br>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <address>
                    <strong>Use Promo:</strong><br>
                    {{ (!is_null($detailOrder->kode_promo))?$detailOrder->detailPromo->kode_promo:'-' }}<br><br>
                </address>
            </div>
            <div class="col-3">
                <address>
                    <strong>Discount Promo:</strong><br>
                    {{ (!is_null($detailOrder->kode_promo))?"$ ".$detailOrder->detailPromo->diskon:"-" }}<br><br>
                </address>
            </div>
            <div class="col-4 text-right">
                <address>
                    <strong>Period Promo:</strong><br>
                    {{ (!is_null($detailOrder->kode_promo))?$detailOrder->detailPromo->berlaku_awal." - ".$detailOrder->detailPromo->berlaku_akhir:"-" }}<br><br>
                </address>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-5">
                <address>
                    <strong>Courier:</strong><br>
                    {{ $detailOrder->shippingService->kurir }}<br><br>
                </address>
            </div>
            <div class="col-3">
                <address>
                    <strong>Shipping Service:</strong><br>
                    {{ $detailOrder->shippingService->jenis_layanan }}<br><br>
                </address>
            </div>
            <div class="col-4 text-right">
                <address>
                    <strong>Shipping Period:</strong><br>
                    {{ $detailOrder->shippingService->jangka_pengiriman }} Day<br><br>
                </address>
            </div>
            <div class="col-4">
                <address>
                    <strong>Shipping Cost:</strong><br>
                    $ {{ $detailOrder->shippingService->tarif / 14000 }}<br><br>
                </address>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <address>
                    <strong> Information </strong>
                    {!! $detailOrder->keterangan !!}
                </address>
            </div>
        </div>
    </div>
</div>