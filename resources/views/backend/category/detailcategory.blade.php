@extends('backend.general.master')
@extends('backend.category.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail kategory</h4>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <address>
                                <strong>Code Category:</strong><br>
                                <h4>{{ $detailCategory->kode_kategori }}</h4><br>
                            </div>
                            <div class="col-4">
                                <address>
                                    <strong>Name Category:</strong><br>
                                    <h4>{{ $detailCategory->nama_kategori }}</h4><br>
                                </address>
                            </div>
                        </div>
                         <a href="{{route('categoryIndex')}}">
                            <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
