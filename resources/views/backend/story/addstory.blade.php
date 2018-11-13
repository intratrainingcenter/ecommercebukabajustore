@extends('backend.general.master')
@extends('backend.story.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Add Story
                    </h4>
                    <br>
                    <hr>
                    {{Form::open(['route'=>'storyCreate','method'=>'post'])}}
                    <div class="row">
                        <div class="form-group col-md-12">
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
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Title')}}
                              {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Enter Title','required'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Deskripsi')}}
                              {{Form::textarea('deskripsi',null,['class'=>'summernote','placeholder'=>'Deskripsi Image','required'])}}
                            </div>
                        </div>
                    </div>
                    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                    <a href="{{route('storyIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
                      {!!Backendhelper::CroopieModal('modalcroopie',$input,'story')!!} {{-- include backendhelper in app/library/backendhelper --}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
