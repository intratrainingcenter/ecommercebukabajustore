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
            <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}"  placeholder="Address">
            @if ($errors->has('address'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
            <input id="phoneNumber" type="number" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" value="{{ old('phoneNumber') }}"  placeholder="Phone Number">
            @if ($errors->has('phoneNumber'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phoneNumber') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12">
          {{Form::select('gender',[''=>'Choose Gender', 'male'=>'male', 'female'=>'Female',],old('gender'),['class'=>'form-control','required'])}}
            @if ($errors->has('gender'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('gender') }}</strong>
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
