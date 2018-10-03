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
                            <div class="col-sm-12">
                                {{Form::file('images',['class'=>'inputImagestory'])}}
                                {{Form::hidden('valueImage',$story->foto)}}
                                {{Form::hidden('storyid',$story->id)}}
                            </div>
                        </div>
                        <div id="cropimagestory" class="col-md-12"></div>
                        <div class="input-field col-md-3"><input type="hidden" name="imageStory" value="" data-error=".err6"></div>
                        <div class="col-md-12 accepted"></div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Deskripsi')}}
                                {{Form::textarea('deskripsi',$story->deskripsi,['class'=>'form-control','placeholder'=>'Deskripsi Image','required'])}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                              {{Form::label('Status')}}
                              {{Form::select('status', ['Aktif' => 'Aktif', 'NonAktif' => 'NonAktif'], $story->status,['class'=>'form-control','required'])}}
                            </div>
                        </div>
                    </div>
                    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
                    <a href="{{route('storyIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
