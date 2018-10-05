  {{Form::open(['route'=>'categoryCreate','method'=>'post','enctype'=>'multipart/form-data'])}}
  <div class="row">
      <div class="form-group col-md-6 @if($errors->has('codeCategory')) has-primary @endif">
          <div class="col-sm-12">
              {{Form::label('Code Category')}}
              {{Form::text('codeCategory',null,['class'=>'form-control','placeholder'=>'Enter Code Category'])}}
              @if($errors->has('codeCategory')) <div class="form-control-feedback">{{ $errors->first('codeCategory') }}</div> @endif
          </div>
      </div>
      <div class="form-group col-md-6 @if($errors->has('nameCategory')) has-primary @endif">
          <div class="col-sm-12">
              {{Form::label('Name Category')}}
              {{Form::text('nameCategory',null,['class'=>'form-control','placeholder'=>'Enter Name Category'])}}
              @if($errors->has('nameCategory')) <div class="form-control-feedback">{{ $errors->first('nameCategory') }}</div> @endif
          </div>
      </div>
  </div>
      {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
  {{Form::close()}}
