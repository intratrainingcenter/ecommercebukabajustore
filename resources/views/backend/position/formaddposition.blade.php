    {{Form::open(['route'=>'positionCreate','method'=>'post','enctype'=>'multipart/form-data'])}}
    <div class="row">   
        <div class="form-group col-md-6 @if($errors->has('codePosition')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Code Position')}}
                {{Form::text('codePosition',null,['class'=>'form-control','placeholder'=>'Enter Code Position'])}}
                @if($errors->has('codePosition')) <div class="form-control-feedback">{{ $errors->first('codePosition') }}</div> @endif
            </div>
        </div>
        <div class="form-group col-md-6 @if($errors->has('namePosition')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Name Position')}}
                {{Form::text('namePosition',null,['class'=>'form-control','placeholder'=>'Enter Code Position'])}}
                @if($errors->has('namePosition')) <div class="form-control-feedback">{{ $errors->first('namePosition') }}</div> @endif
            </div>
        </div>
    </div>
        {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
    {{Form::close()}}