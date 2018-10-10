@extends('backend.general.master')
@extends('backend.category.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add Category</h4>
                    <br>
                    <hr>
                    @include('backend.category.formaddcategory')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
