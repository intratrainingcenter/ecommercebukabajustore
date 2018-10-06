{{Form::open(['route'=>'aboutCreate','method'=>'post','enctype'=>'multipart/form-data'])}}
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">About</h4>
                <div class="m-b-30 form-group @if($errors->has('imageAbout')) has-primary @endif">
                    <div class="fallback">
                        <input name="image" type="file" class="inputImageabout form-control">
                        @if($errors->has('imageAbout')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                    </div>
                </div>
                <div id="cropimageabout" class="col-md-12"></div>
                <div class="input-field col-md-3"><input type="hidden" name="imageAbout" value="" data-error=".err6"></div>
                <div class="col-md-12 accepted"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12 @if($errors->has('Title')) has-primary @endif">
        <div class="col-sm-12">
            {{Form::label('Title')}}
            {{Form::text('Title',null,['class'=>'form-control','placeholder'=>'Enter Title'])}}
            @if($errors->has('Title')) <div class="form-control-feedback">{{ $errors->first('Title') }}</div> @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group col-sm-12 @if($errors->has('Description')) has-primary @endif">
          {{Form::label('Description')}}
            {{Form::textarea('Description',null,['class'=>'form-control','placeholder'=>'Enter Description'])}}
            @if($errors->has('Description')) <div class="form-control-feedback">{{ $errors->first('Description') }}</div> @endif
        </div>
    </div>
  
</div>


{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
{{Form::close()}}
