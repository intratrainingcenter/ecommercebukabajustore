@extends('backend.general.master')
@extends('backend.ordertransaction.component.asset')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    @include('backend.ordertransaction.infodetail')
                    @include('backend.ordertransaction.listdetail')
                    @include('backend.ordertransaction.modaldetail')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection