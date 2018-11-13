@extends('backend.general.master')
@extends('backend.user.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail User</h4>
                    <br>
                    <hr>
                    <div class="row">
                        @include('backend.user.formdetailuser')
                    </div>
                     <a href="{{route('userIndex')}}">
                        <button type="button" class="btn btn-warning waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
