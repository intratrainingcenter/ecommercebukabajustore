@extends('frontend.general.master')
@extends('frontend.shop.component.asset')
@section('content')
<section class="sec-product bg0 p-t-100 p-b-50">
		<!-- Product -->
	<div class="container">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
              {{Form::open(['route'=>'updateProfile','method'=>'put'])}}
              <div class="row">
                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-20">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Image User</h4>
                                    <div class="m-b-30 form-group">
                                        <div class="fallback">
                                            <input name="image" type="file" class="inputImageuser form-control">
                                        </div>
                                    </div>
                                        <div id="showimageuser" class="col-md-12"></div>
                                        <div id="cropimageuser" class="col-md-12"></div>
                                        <div class="input-field col-md-3"><input type="hidden" name="imageUser" value="" data-error=".err6"></div>
                                        <div class="col-md-12 accepted"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              <div class="col-md-6">
                <br><br>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          {{Form::text('name',Auth::user()->name,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                    <div class="form-group row @if($errors->has('email')) has-primary @endif">
                        <label for="example-text-input" class="col-sm-3 col-form-label">E-mail</label>
                        <div class="col-sm-9">
                          {{Form::email('email',Auth::user()->email,['class'=>'form-control','parsley-type'=>'email','required'])}}
                          @if($errors->has('email')) <div class="form-control-feedback">{{ $errors->first('email') }}</div> @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                          {{Form::text('address',Auth::user()->alamat,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                          {{Form::text('phone',Auth::user()->no_telp,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                          {{Form::select('gender',['male'=>'male', 'female'=>'Female',],Auth::user()->jenis_kelamin,['class'=>'form-control','required'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            {{Form::password('password',['class'=>'form-control','placeholder'=>'Password','id'=>'pass2'])}}
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Confirm Password</label>
                          <div class="col-sm-9">
                            {{Form::password('',['class'=>'form-control','placeholder'=>'Re-Type Password','data-parsley-equalto'=>'#pass2'])}}
                        </div>
                    </div>
                    <br>
                    {{Form::button('Save Changes',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                  </div>
        </div>
        {{Form::close()}}
      </div>
    </div>
  </div>
  </div>
  </section>
@endsection
