{{Form::open(['route'=>'addProduct','method'=>'post'])}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Image Product</h4>
                    <div class="m-b-30 form-group @if($errors->has('imageProduct')) has-primary @endif">
                        <div class="fallback">
                            <input name="image" type="file" class="inputImageproduct form-control">
                              @if($errors->has('imageProduct')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                        </div>
                    </div>
                      <center>  <div id="showimageproduct" class="col-md-12"></div> </center>
                        <div id="cropimageproduct" class="col-md-12"></div>
                        <div class="input-field col-md-3"><input type="hidden" name="imageProduct" value="" data-error=".err6"></div>
                        <div class="col-md-12 accepted"></div>
                </div>
            </div>
        </div>
          <div class="form-group col-md-6">
              <div class="col-sm-12">
                <div class="m-b-30 form-group @if($errors->has('nama_barang')) has-primary @endif">
                {{Form::label('Name Product')}}
                  {{Form::text('nama_barang',null,['class'=>'form-control','placeholder'=>'Enter Name Product','required'])}}
                  @if($errors->has('nama_barang')) <div class="form-control-feedback">{{ $errors->first('nama_barang') }}</div> @endif
                </div>
              </div>
          </div>
          <div class="form-group col-md-6">
              <div class="col-sm-12">
                {{Form::label('Category')}}
                  {{Form::select('codeCategory',$category,null,['class'=>'form-control','required'])}}
              </div>
          </div>
        <div class="form-group col-md-6">
            <div class="form-group col-sm-12">
              <div class="m-b-30 form-group @if($errors->has('weightProduct')) has-primary @endif">
              {{Form::label('Weight Product')}}
              <div class="input-group">
                {{Form::number('weightProduct',null,['class'=>'form-control','placeholder'=>'Enter Weight Product','min'=>'0','required'])}}
                <span class="input-group-addon b-0">gram</span>
                @if($errors->has('weightProduct')) <div class="form-control-feedback">{{ $errors->first('weightProduct') }} </div> @endif
                </div>
              </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="m-b-30 form-group @if($errors->has('purchaseProduct')) has-primary @endif">
            <div class="form-group col-sm-12">
              {{Form::label('Purchase Price Product')}}
                {{Form::number('purchaseProduct',null,['class'=>'form-control','placeholder'=>'Enter Purchase Price Product','min'=>'0','required'])}}
                @if($errors->has('purchaseProduct')) <div class="form-control-feedback">{{ $errors->first('purchaseProduct') }}</div> @endif
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="m-b-30 form-group @if($errors->has('sellingProduct')) has-primary @endif">
            <div class="form-group col-sm-12">
              {{Form::label('Selling Price Product')}}
                {{Form::number('sellingProduct',null,['class'=>'form-control','placeholder'=>'Enter Selling Price Product','min'=>'0','required'])}}
                @if($errors->has('sellingProduct')) <div class="form-control-feedback">{{ $errors->first('sellingProduct') }}</div> @endif
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
              <div class="m-b-30 form-group @if($errors->has('stockProduct')) has-primary @endif">
            <div class="form-group col-sm-12">
              {{Form::label('Stock Product')}}
                {{Form::number('stockProduct',null,['class'=>'form-control','placeholder'=>'Enter Stock Product','min'=>'0','required'])}}
                @if($errors->has('stockProduct')) <div class="form-control-feedback">{{ $errors->first('stockProduct') }}</div> @endif
              </div>
            </div>
          </div>
        <div class="col-md-12">
            <div class="form-group col-sm-12">
              {{Form::label('Description')}}
                {{Form::textarea('description',null,['class'=>'summernote','placeholder'=>'Enter Description','required','max'=>'255'])}}
            </div>
            <br> {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
        </div>
    </div>
{{Form::close()}}
