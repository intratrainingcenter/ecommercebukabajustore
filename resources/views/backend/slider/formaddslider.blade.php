    {{Form::open(['route'=>'sliderCreate','method'=>'post'])}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Image Slider</h4>
                    <div class="m-b-30 form-group @if($errors->has('imageslider')) has-primary @endif">
                        <div class="fallback">
                            <input name="image" type="file" class="inputImageslider form-control">
                              @if($errors->has('imageslider')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                        </div>
                    </div>
                    <div id="cropimageslider" class="col-md-12"></div>
                    <div class="input-field col-md-3"><input type="hidden" name="imageslider" value="" data-error=".err6"></div>
                    <div class="col-md-12 accepted"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
         <div class="form-group col-md-6 @if($errors->has('description')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Description')}}
                <div>
                <textarea required class="form-control" rows="5" placeholder="Enter Description" name="description" id="description"></textarea>
                </div>
                @if($errors->has('description')) <div class="form-control-feedback">{{ $errors->first('description') }}</div> @endif
            </div>
        </div> 
        <div class="form-group col-md-6 @if($errors->has('status')) has-primary @endif">
            <div class="col-sm-12">
                 {{Form::label('status')}}
                 <select name="status" id="status_slider" class="form-control">
                    <option disabled="true">----Select-----</option>
                    <option value="Active">Active</option>
                    <option value="NonActive">NonActive</option>
                </select>
                @if($errors->has('status')) <div class="form-control-feedback">{{ $errors->first('status') }}</div> @endif
            </div>
        </div>
       
    </div> 
    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
    {{Form::close()}}