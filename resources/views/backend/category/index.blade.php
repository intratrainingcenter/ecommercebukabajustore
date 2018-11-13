@extends('backend.general.master')
@extends('backend.category.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    {!! Backendhelper::alertsuccess($message) !!}
                    <?php Session::forget('success');?>
                    @endif
                    <h4 class="mt-0 header-title">Data Category
                        <a href="{{route('categoryAdd')}}"><button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Add</button></a>
                    </h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code Category</th>
                                <th>Name Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="dataCategory">
                            @php
                            $no = 1;
                            @endphp
                            @foreach($dataCategory as $itemCategory)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $itemCategory->kode_kategori }}</td>
                                <td>{{ $itemCategory->nama_kategori }}</td>
                                <td>{!!Backendhelper::read_update_delete_byid($itemCategory->id,route('categoryEdit',['id'=>$itemCategory->id]),route('categoryDetail',['id'=>$itemCategory->id]))!!}</td>
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
                <p>Are you sure will delete this data position ?</p>
                <input type="hidden" name="idCategory" id="idCategory">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="functionDelete">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
