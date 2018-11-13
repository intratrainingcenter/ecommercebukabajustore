@extends('backend.general.master')
@extends('backend.story.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Update Story
                    </h4>
                    <br>
                    <hr>
                    {{Form::open(['route'=>'storyUpdate','method'=>'post'])}}
                    <div class="row">
                        <div class="form-group col-md-12">
                          <div class="col-sm-12">
                              {{Form::label('Images')}}
                          </div>
                          <div class="imgshow">
                            <img src="{{ asset('storage/imagestory'.'/'.$story->foto) }}" alt="" style="display: block;margin-left: auto;margin-right: auto;width: 40%;">
                          </div>
                            <div class="col-sm-12">
                              <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcroopie">Choose a Image</button>
                              @php
                                $input = Form::file('images',['class'=>'inputImagestory']);
                              @endphp
                                {{Form::hidden('valueImage',$story->foto)}}
                                {{Form::hidden('storyid',$story->id)}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Title')}}
                              {{Form::text('title',$story->judul,['class'=>'form-control','placeholder'=>'Enter Title','required'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Deskripsi')}}
                                {{Form::textarea('deskripsi',$story->deskripsi,['class'=>'summernote','placeholder'=>'Deskripsi Image','required'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Status')}}
                              {{Form::select('status', ['Active' => 'Active', 'NonActive' => 'NonActive'], $story->status,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                    <a href="{{route('storyIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
                        {!!Backendhelper::CroopieModal('modalcroopie',$input,'story')!!}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
