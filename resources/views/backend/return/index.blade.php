@extends('backend.general.master')
@extends('backend.return.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                  @if(session('process'))
                    <div class="alert alert-success" role="alert">
                       <strong>Success !</strong> Return Process is successfully.
                   </div>
                 @elseif (session('received'))
                   <div class="alert alert-success" role="alert">
                      <strong>Success !</strong> Return Received is successfully.
                  </div>
                @elseif (session('reject'))
                  <div class="alert alert-success" role="alert">
                     <strong>Success !</strong> Return Reject is successfully.
                 </div>
                @endif
                    <h4 class="mt-0 header-title">Data Return Transaction</h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code Return</th>
                                <th>Code Transaction</th>
                                <th>Name Member</th>
                                <th>Date Return</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="loaddatastory">
                          @php
                            $no = 1;
                          @endphp
                          @foreach($returnProduct as $itemreturnProduct)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $itemreturnProduct->kode_retur }}</td>
                                <td>{{ $itemreturnProduct->kode_pemesanan }}</td>
                                <td>{{ $itemreturnProduct->userMember->name }}</td>
                                <td>{{ $itemreturnProduct->tgl_retur }}</td>
                                <td><i class=@if ($itemreturnProduct->status == 'Pending')"badge badge-warning" @elseif($itemreturnProduct->status == 'process') "badge badge-default" @elseif($itemreturnProduct->status == 'received') "badge badge-success" @elseif($itemreturnProduct->status == 'reject') "badge badge-primary" @endif >{{$itemreturnProduct->status}}</i></td>
                                <td>
                                  <a href="{{ route('processReturn',['codereturn'=>encrypt($itemreturnProduct->kode_retur)]) }}" class="btn btn-outline-info waves-effect waves-light"><i class="fa fa-check"></i></a>
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
