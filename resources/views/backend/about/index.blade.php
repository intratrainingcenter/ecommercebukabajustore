@extends('backend.general.master')
@extends('backend.about.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">About
                        <a href="{{route('aboutAdd')}}"><button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Add</button></a>
                    </h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="dataAbout">
                            @php
                                $no = 1;
                            @endphp
                            @foreach($dataAbout as $itemAbout)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $itemAbout->judul }}</td>
                                <td> {{ $itemAbout->status }}</td>
                                <td>{!!Backendhelper::read_update_delete_byid($itemAbout->id,route('aboutEdit',['id'=>$itemAbout->id]),route('aboutDetail',['id'=>$itemAbout->id]))!!}</td>
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
                <p>Are you sure will delete this data about ?</p>
                <input type="hidden" name="idAbout" id="idAbout">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="functionDelete">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
