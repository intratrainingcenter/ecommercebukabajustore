@extends('backend.general.master')
@extends('backend.return.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    @include('backend.return.infodetailtransaction')
                    @include('backend.return.listdetailtransaction')
                    @include('backend.return.modaldetailreturn')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
