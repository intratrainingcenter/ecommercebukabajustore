@extends('backend.general.master')
@extends('backend.slider.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Edit slider</h4>
                    <br>
                    <hr>
                    @include('backend.slider.formeditslider')
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection