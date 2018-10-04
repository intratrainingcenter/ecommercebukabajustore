@extends('backend.general.master')
@extends('backend.product.component.asset')
@section('content')
<div class="container-fluid">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Update Product
                        <a href="{{route('productIndex')}}">
                            <button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus"></i> Data</button>
                        </a>
                    </h4>
                    <br>
                    <hr>
                    @include('backend.product.formupdateproduct')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
