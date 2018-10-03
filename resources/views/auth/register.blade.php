@include('auth.component.asset')
 <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index-2.html" class="logo logo-admin"><img src="{{asset('backend/assets/images/logo.png')}}" height="54" alt="logo"></a>
                    </h3>
                    <h4 class="text-muted text-center font-18"><b>Register</b></h4>
                    <div class="p-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="User Name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-mail">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
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
                </div>
            </div>
        </div>
    </div>
