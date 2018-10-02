@extends('backend.general.master')
@extends('backend.promo.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add Promo
                        <a href="{{route('promoIndex')}}">
                            <button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Data</button>
                        </a>
                    </h4>
                    <br>
                    <hr>
                    {{Form::open(['route'=>'promoCreate','method'=>'post'])}}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::label('Kode Promo')}}
                            <div class="col-sm-12">
                                {{Form::text('codePromo',null,['class'=>'form-control','placeholder'=>'Enter Code Promo'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('Name Promo')}}
                            <div class="col-sm-12">
                                {{Form::text('namePromo',null,['class'=>'form-control','placeholder'=>'Enter Code Promo'])}}
                            </div>
                        </div>
                    </div>
                    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection