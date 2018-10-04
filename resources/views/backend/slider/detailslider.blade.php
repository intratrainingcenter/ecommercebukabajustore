@extends('backend.general.master')
@extends('backend.slider.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail slider</h4>
                    <br>
                    <hr> 
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col-12">
                            <img src="{{ asset('storage/imageslider'.'/'.$detailslider->foto) }}">
                        </div>
                        <div class="col-4">
                            <address>
                                <strong>Code slider:</strong><br>
                                <h4>{{ $detailslider->kode_slider }}</h4><br>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Name slider:</strong><br>
                                    <h4>{{ $detailslider->nama_slider }}</h4><br>
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Discount:</strong><br>
                                    <h4>{{ $detailslider->diskon }}</h4><br>
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Minimum Purchase:</strong><br>
                                    <h4>{{ $detailslider->min_pembelian}}</h4><br>
                                </address>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Period:</strong><br>
                                    <h4>{{ $detailslider->berlaku_awal}} - {{ $detailslider->berlaku_akhir }}</h4><br>
                                </address>
                            </div>
                        </div>   
                         <a href="{{route('sliderIndex')}}">
                            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endsection