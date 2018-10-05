@extends('backend.general.master')
@extends('backend.story.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                  @if(session('add'))
                    <div class="alert alert-success" role="alert">
                       <strong>Well done!</strong> The data was successfully added.
                   </div>
                 @elseif (session('update'))
                   <div class="alert alert-success" role="alert">
                      <strong>Well done!</strong> Story data has been updated successfully.
                  </div>
                  @endif
                    <h4 class="mt-0 header-title">Data Story
                        <a href="{{route('storyAdd')}}"><button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Add</button></a>
                    </h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Images</th>
                                <th>User Upload</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="loaddatastory">
                          @php
                            $no = 1;
                          @endphp
                          @foreach($story as $show)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><img src="{{ asset('storage/imagestory'.'/'.$show->foto) }}" alt="" style="width:100px; height:100px;"></td>
                                <td>{{$show->created_by}}</td>
                                <td><i class=@if ($show->status == 'Aktif')"badge badge-success" @else "badge badge-primary" @endif >{{$show->status}}</i></td>
                                <td>
                                    {!!Backendhelper::story_read_update_delete_byid($show->id,route('ShowstoryUpdate',['id'=>$show->id]),route('storyDetail',['id'=>$show->id]))!!}
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Are you sure will delete this data Story ?</p>
                <input type="hidden" name="" value="" id="idStory">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect waves-light pull-left" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="deleteStory">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
