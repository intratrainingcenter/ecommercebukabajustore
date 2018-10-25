@extends('backend.general.master')
@section('content')
<section class="sec-product bg0 p-t-100 p-b-50">
    <div class="row">
    <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Message
                    </h4>
                    <br>
                    <h3 class="pull-right font-18">Date: {{$datacontact->created_at}}</h3>
                    <h4 class="font-16"><strong>From :{{$datacontact->email}}</strong></h4>
                    <hr> 
                    <div>
                    <div class="row">
                    <div class="col-6">
                        <address>
                            <strong>{{substr($datacontact->pesan,0,20)}}</strong><br>
                            {{$datacontact->pesan}}
                        </address>
                    </div>
                    </div>
                </div>
            </div>
        </div>   
        <a href="{{route('ContactBack.index')}}"><button class="btn btn-primary" type="button"><i class="fa fa-arrow-circle-left"></i> Cancle</button></a>
    </div>
</section>
@endsection