@extends('backend.general.master')
@extends('backend.about.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add About</h4>
                    <br>
                    <hr>
                    @include('backend.about.formaddabout')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
