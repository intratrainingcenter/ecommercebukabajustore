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
@endsection
