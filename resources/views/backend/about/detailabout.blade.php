@extends('backend.general.master')
@extends('backend.about.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail About</h4>
                    <br>
                    <hr>
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col-12">
                            <img src="{{ asset('storage/imageabout'.'/'.$detailAbout->foto) }}">
                        </div>
                      </div>
                    </div>
             <div class="col-4">
               <br><br>
                      <div class="col-12">
                            <address>
                                <strong> Title :</strong><br>
                                <h4> {{  $detailAbout->judul  }} </h4>
                            </address>
                      </div>
                      <div class="col-12">
                            <address>
                                <strong> Deskripsi :</strong><br>
                                <p> {!!  $detailAbout->deskripsi  !!} </p>
                            </address>
                      </div>
                      <div class="col-12">
                            <address>
                                <strong> Status :</strong><br>
                                <h4> {{  $detailAbout->status  }} </h4>
                            </address>
                      </div>


                         <a href="{{route('aboutIndex')}}">
                            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
