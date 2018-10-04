@extends('backend.general.master')
@extends('backend.user.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add User
                    </h4>
                    <br>
                    <hr>
                    {{Form::open(['route'=>'storyCreate','method'=>'post'])}}
                    <div class="row">
                        <div class="form-group col-md-6">
                          <div class="col-sm-12">
                            {{Form::label('Images')}}
                          </div>
                          <div class="imgshow"></div>
                            <div class="col-sm-12">
                              <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcroopie">Choose a Image</button>
                                @php
                                  $input = Form::file('images',['class'=>'inputImagestory','required']);
                                @endphp
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('Name')}}
                              {{Form::text('name',null,['class'=>'form-control','placeholder'=>'User Name'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('Password')}}
                              {{Form::Password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('E-mail')}}
                              {{Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('Gender')}}
                              {{Form::select('gender', ['man' => 'Man', 'woman' => 'Woman'],null,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('Address')}}
                              {{Form::text('addres',null,['class'=>'form-control','placeholder'=>'Your Addres'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('Position')}}
                              {{Form::select('position',$position,null,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="col-sm-12">
                              {{Form::label('No-Tlp')}}
                              {{Form::number('phonenumber',null,['class'=>'form-control','placeholder'=>'Number Phone'])}}
                            </div>
                        </div>
                    </div>
                    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                    <a href="{{route('storyIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
                      {!!Backendhelper::CroopieModal('modalcroopie',$input)!!}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
