@extends('backend.general.master')
@extends('backend.setting.component.asset')
@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card m-b-20">
            {{Form::open(['route'=>'settingUpdate','method'=>'put'])}}
              <div class="card-body">
                  <h4 class="mt-0 header-title">Update Data Website</h4><br>
                  <input hidden type="text" value="{{ $setting->id }}" name="id">
                      <div class="col-12">
                          <div class="card m-b-20">
                              <div class="card-body">
                                  <h4 class="mt-0 header-title">Image Website</h4>
                                  <div class="m-b-30 form-group @if($errors->has('imageWebsite')) has-primary @endif">
                                      <div class="fallback">
                                          <input name="image" type="file" class="inputImagewebsite form-control">
                                            @if($errors->has('imageWebsite')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                                      </div>
                                  </div>
                                    <center>  <div id="showimagewebsite" class="col-md-12"></div> </center>
                                      <div id="cropimagewebsite" class="col-md-12"></div>
                                      <div class="input-field col-md-3"><input type="hidden" name="imageWebsite" value="" data-error=".err6"></div>
                                      <div class="col-md-12 accepted"></div>
                              </div>
                          </div>
                      </div>
                  <div class="form-group row">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Name Website</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" value="{{ $setting->nama_web }}" name="name_website" required placeholder="Enter Name Website">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="text" value="{{ $setting->alamat }}" name="address" required placeholder="Enter Address" value="">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                      <div class="col-sm-10">
                          <input class="form-control" name="phone" value="{{ $setting->no_telp }}" type="number" required placeholder="Enter Phone Number" value="">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                          <input class="form-control" type="email" name="email" value="{{ $setting->email }}" required placeholder="Enter Email" id="example-email-input">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-2">Description</label>
                      <div class="col-sm-10">
                          <textarea required name="description" class="form-control" rows="5"> {{ $setting->deskripsi }} </textarea>
                      </div>
                    </div>
                      {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                  {{Form::close()}}
              </div>
          </div>
      </div> <!-- end col -->
  </div> <!-- end row -->
</div>
@endsection
