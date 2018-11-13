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
                                <strong>Description:</strong><br>
                                <h4>{{ $detailslider->deskripsi }}</h4><br>
                            </div>
                        </div>   
                         <a href="{{route('sliderindex')}}">
                            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endsection