@extends('backend.general.master')
@extends('backend.promo.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Promo</h4>
                    <br>
                    <hr> 
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col-12">
                            <img src="{{ asset('storage/imagepromo'.'/'.$detailPromo->foto) }}">
                        </div>
                        <div class="col-4">
                            <address>
                                <strong>Code Promo:</strong><br>
                                <h4>{{ $detailPromo->kode_promo }}</h4><br>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Name Promo:</strong><br>
                                    <h4>{{ $detailPromo->nama_promo }}</h4><br>
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Discount:</strong><br>
                                    <h4>{{ $detailPromo->diskon }}</h4><br>
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Minimum Purchase:</strong><br>
                                    <h4>{{ $detailPromo->min_pembelian}}</h4><br>
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Period:</strong><br>
                                    <h4>{{ $detailPromo->berlaku_awal}} - {{ $detailPromo->berlaku_akhir }}</h4><br>
                                </address>
                            </div>
                        </div>   
                         <a href="{{route('promoIndex')}}">
                            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endsection