@extends('backend.general.master')
@extends('backend.position.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Position</h4>
                    <br>
                    <hr> 
                    <div class="row">
                        <div class="col-4">
                            <address>
                                <strong>Code Position:</strong><br>
                                <h4>{{ $detailPosition->kode_jabatan }}</h4><br>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Name Position:</strong><br>
                                    <h4>{{ $detailPosition->nama_jabatan }}</h4><br>
                                </address>
                            </div>
                        </div>   
                         <a href="{{route('positionIndex')}}">
                            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endsection