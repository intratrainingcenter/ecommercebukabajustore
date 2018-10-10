<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Image User</h4>
                    <div class="m-b-30 form-group @if($errors->has('imageUser')) has-primary @endif">
                        <div class="fallback">
                            <input name="image" type="file" class="inputImageregister form-control">
                              @if($errors->has('imageUser')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
                        </div>
                    </div>
                        <div id="showimageregister" class="col-md-12"></div>
                        <div id="cropimageregister" class="col-md-12"></div>
                        <div class="input-field col-md-3"><input type="hidden" name="imageUser" value="" data-error=".err6"></div>
                        <div class="col-md-12 accepted"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  placeholder="User Name">
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="E-mail">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}"  placeholder="Address">
            @if ($errors->has('alamat'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('alamat') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="no_telp" type="number" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" value="{{ old('no_telp') }}"  placeholder="Phone Number">
            @if ($errors->has('no_telp'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('no_telp') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
          {{Form::select('jenis_kelamin',[''=>'Choose Gender', 'male'=>'male', 'female'=>'Female',],old('jenis_kelamin'),['class'=>'form-control','required'])}}
            @if ($errors->has('jenis_kelamin'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="Password">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password">
        </div>
    </div>
    <div class="form-group row mb-0 text-center row m-t-20">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                {{ __('Register') }}
            </button>
        </div>
    </div>
   <div class="form-group m-t-10 mb-0 row">
        <div class="col-12 m-t-20 text-center">
            <a href="{{route('login')}}" class="text-muted">Already have account?</a>
        </div>
    </div>
</form>
