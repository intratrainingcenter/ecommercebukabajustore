@extends('backend.general.master')
@extends('backend.promo.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Promo
                        <a href="{{route('promoIndex')}}">
                        <button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Data</button>
                        </a>
                    </h4>
                    <br>
                    <hr> 
                    <div class="row">
                        <div class="col-4">
                            <address>
                                <strong>Billed To:</strong><br>
                                John Smith<br>
                        </div>
                        <div class="col-4">
                            <address>
                                <strong>Shipped To:</strong><br>
                                Kenny Rigdon<br>
                            </address>
                        </div>
                          <div class="col-4">
                            <address>
                                <strong>Shipped To:</strong><br>
                                Kenny Rigdon<br>
                            </address>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection