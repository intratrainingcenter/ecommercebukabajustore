@include('auth.component.asset')

<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mt-0 m-b-15">
                <a href="index-2.html" class="logo logo-admin"><img src="{{asset('backend/assets/images/logo.png')}}" height="54" alt="logo"></a>
            </h3>
            <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
        <div class="p-3">
            <form method="POST"  class="form-horizontal m-t-20" action="{{ route('login') }}">
                @csrf
                   <div class="form-group row">
                        <div class="col-12">
                           <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="E-Mail">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">
                                    {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-7 m-t-20">
                            <a class="text-muted" href="{{ route('password.request') }}">
                                <i class="mdi mdi-lock    "></i>
                                    {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        @if ($useradmin < 1)
                        <div class="col-sm-5 m-t-20">
                            <a href="{{route('register')}}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
