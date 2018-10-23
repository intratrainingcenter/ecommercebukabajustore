@extends('backend.general.master')
@extends('backend.ordertransaction.component.asset')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

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
                                        {{ $discountPromo = (!is_null($detailOrder->kode_promo))?"$ ".$detailOrder->detailPromo->diskon:"-" }}<br><br>
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
                                        $ {{ $shippingCost = $detailOrder->shippingService->tarif / 14000 }}<br><br>
                                    </address>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <address>
                                        <strong> Information </strong>
                                        <p>{{ $detailOrder->keterangan }}</p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                            <td class="no-line text-right">$ {{ $shippingCost }}</td>
                                                        </tr>
                                                    <tr>
                                                        <td colspan="3" class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Discount</strong></td>
                                                            <td class="no-line text-right">{{ $discountPromo }}</td>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection