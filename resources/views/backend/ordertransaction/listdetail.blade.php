<div class="row">
    <div class="col-12">
        <div class="panel panel-default">
            <div class="p-2">
                <h3 class="panel-title font-20"><strong>Order list</strong></h3>
            </div>
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="2"><strong>Product</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Annotation</strong></td>
                                <td class="text-right"><strong>Subtotal</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $subtotal=0;
                            @endphp
                            @foreach($detailOrder->opsiDetailHistory as $itemOrder)
                            <tr>
                                <td colspan="2"> <img src="{{ asset('storage/imageproduct/'.$itemOrder->detailProduct->foto)}}" alt="logo" height="42"/>
                                    {{ $itemOrder->detailProduct->nama_barang }}
                                </td>
                                <td class="text-center">$ {{ $itemOrder->harga }}</td>
                                <td class="text-center">{{ $itemOrder->qty }}</td>
                                <td class="text-center">{{ $itemOrder->keterangan }}</td>
                                <td class="text-right">$ {{ $itemOrder->subtotal }}</td>
                            </tr>
                            @php
                            $subtotal += $itemOrder->subtotal;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="3" class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">$ {{ $itemOrder->subtotal }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center">
                                        <strong>Shipping Cost</strong></td>
                                        <td class="no-line text-right">$ {{ $detailOrder->shippingService->tarif / 14000 }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center">
                                            <strong>Discount</strong></td>
                                            <td class="no-line text-right">{{ (!is_null($detailOrder->kode_promo))?"$ ".$detailOrder->detailPromo->diskon:"-" }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">
                                                <strong>Grandtotal</strong></td>
                                                <td class="no-line text-right"><h4 class="m-0">$ {{ $detailOrder->grandtotal }}</h4></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="hidden-print">
                                    <div class="pull-left">
                                        <a href="{{ route('ordertransactionIndex') }}" class="btn btn-info waves-effect waves-light">Back</a>
                                    </div>
                                    <div class="pull-right">
                                        @if($detailOrder->status != "received")
                                        <button class="btn btn-primary waves-effect waves-light">Cancel</button>
                                        @endif
                                        @if($detailOrder->status == "paid")
                                        <button class="btn btn-danger waves-effect waves-light validateProcess" attr-code="{{ encrypt($detailOrder->kode_pemesanan) }}">Process</button>
                                        @elseif($detailOrder->status == "process")
                                        <button class="btn btn-info waves-effect waves-light validateDelivery" attr-code="{{ encrypt($detailOrder->kode_pemesanan) }}">Delivery</button>
                                        @elseif($detailOrder->status == "delivery")
                                        <button class="btn btn-success waves-effect waves-light validateReceived" attr-code="{{ encrypt($detailOrder->kode_pemesanan) }}">Received</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 