{{Form::open(['route'=>'promoCreate','method'=>'post'])}}
<div class="row">
    <div class="form-group col-md-6">
        <div class="col-sm-12">
            {{Form::label('Code Promo')}}
            {{Form::text('codePromo',null,['class'=>'form-control','placeholder'=>'Enter Code Promo'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
            {{Form::label('Name Promo')}}
            {{Form::text('namePromo',null,['class'=>'form-control','placeholder'=>'Enter Code Promo'])}}
        </div>
    </div>
</div>
{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
{{Form::close()}}