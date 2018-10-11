{{Form::open(['route'=>'setupPost','method'=>'post','enctype'=>'multipart/form-data'])}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Logo Website</h4>
                    <div class="m-b-30 form-group @if($errors->has('imageSetup')) has-primary @endif">
                        <div class="fallback">
                            <input name="image" type="file" class="inputImagesetup form-control">
                            @if($errors->has('imageSetup')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                        </div>
                    </div>
                    <div id="cropimagesetup" class="col-md-12"></div>
                    <div id="imageweb" class="col-md-12"></div>
                    <div class="input-field col-md-3"><input type="hidden" name="imageSetup" value="" data-error=".err6"></div>
                    <div class="col-md-12 accepted"></div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="form-group col-md-12 @if($errors->has('nameWebsite')) has-primary @endif">
        <div class="col-sm-12">
            {{Form::label('Name Website')}}
            {{Form::text('nameWebsite',null,['class'=>'form-control','placeholder'=>'Enter Name Website'])}}
            @if($errors->has('nameWebsite')) <div class="form-control-feedback">{{ $errors->first('nameWebsite') }}</div> @endif
        </div>
    </div>
     <div class="form-group col-md-12 @if($errors->has('address')) has-primary @endif">
        <div class="col-sm-12">
            {{Form::label('Address')}}
            {{Form::text('address',null,['class'=>'form-control','placeholder'=>'Enter Name Address'])}}
            @if($errors->has('address')) <div class="form-control-feedback">{{ $errors->first('address') }}</div> @endif
        </div>
    </div>
     <div class="form-group col-md-12 @if($errors->has('contactNumber')) has-primary @endif">
        <div class="col-sm-12">
            {{Form::label('Contact Number')}}
            {{Form::text('contactNumber',null,['class'=>'form-control','placeholder'=>'Enter Contact Number'])}}
            @if($errors->has('contactNumber')) <div class="form-control-feedback">{{ $errors->first('contactNumber') }}</div> @endif
        </div>
    </div>
     <div class="form-group col-md-12 @if($errors->has('email')) has-primary @endif">
        <div class="col-sm-12">
            {{Form::label('Email')}}
            {{Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Email'])}}
            @if($errors->has('email')) <div class="form-control-feedback">{{ $errors->first('email') }}</div> @endif
        </div>
    </div>
     <div class="form-group col-md-12 @if($errors->has('description')) has-primary @endif">
        <div class="col-sm-12">
            {{Form::label('Description')}}
            {{Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Enter Description'])}}
            @if($errors->has('description')) <div class="form-control-feedback">{{ $errors->first('nameWebsite') }}</div> @endif
        </div>
    </div>

</div>
{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
{{Form::close()}}
