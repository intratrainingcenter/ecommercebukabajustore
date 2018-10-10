@extends('auth.general.master')
@section('content')
 <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index-2.html" class="logo logo-admin"><img src="{{asset('backend/assets/images/logo.png')}}" height="54" alt="logo"></a>
                    </h3>
                    <h4 class="text-muted text-center font-18"><b>Register</b></h4>
                    <div class="p-3">
                      @include('auth.formregister')
                </div>
            </div>
        </div>
    </div>
@endsection
    
