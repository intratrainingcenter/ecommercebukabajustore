  {{Form::open(['route'=>'categoryCreate','method'=>'post','enctype'=>'multipart/form-data'])}}
  <div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Image Category</h4>
                <div class="m-b-30 form-group @if($errors->has('imageCategory')) has-primary @endif">
                    <div class="fallback">
                        <input name="image" type="file" class="inputimageCategory form-control">
                          @if($errors->has('imageCategory')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                    </div>
                </div>
                  <center>  <div id="showiimageCategory" class="col-md-12"></div> </center>
                    <div id="cropimageCategory" class="col-md-12"></div>
                    <div class="input-field col-md-3"><input type="hidden" name="imageCategory" value="" data-error=".err6"></div>
                    <div class="col-md-12 accepted"></div>
            </div>
        </div>
    </div>
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
