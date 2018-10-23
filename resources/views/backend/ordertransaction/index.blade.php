@extends('backend.general.master')
@extends('backend.ordertransaction.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Data Order Transaction</h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code Transaction</th>
                                <th>Transaction Date</th>
                                <th>Buyer</th>
                                <th>Grandtotal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="dataPromo">
                            @php
                            $no = 1;
                            @endphp
                            @foreach($dataOrder as $itemOrder)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $itemOrder->kode_pemesanan }}</td>
                                <td>{{ $itemOrder->tgl_pemesanan }}</td>
                                <td>{{ $itemOrder->detailUser->name }}</td>
                                <td>$ {{ $itemOrder->grandtotal }}</td>
                                <td>
                                    @if($itemOrder->status == "pending")
                                    <i class="badge badge-warning"> Pending </i>
                                    @elseif($itemOrder->status == "paid")
                                    <i class="badge badge-danger"> Paid </i>
                                    @elseif($itemOrder->status == "process")
                                    <i class="badge badge-default"> Process </i>
                                    @elseif($itemOrder->status == "delivery")
                                    <i class="badge badge-info"> Delivery </i>
                                    @elseif($itemOrder->status == "received")
                                    <i class="badge badge-success"> Received </i>
                                    @elseif($itemOrder->status == "cancel")
                                    <i class="badge badge-primary"> Canceled </i>
                                    @endif
                                </td>
                                <td>
                                    {!! Backendhelper::read_order_transaction(route('ordertransactionDetail',['id'=>encrypt($itemOrder->id)])) !!}
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
                <p>Are you sure will delete this data promo ?</p>
                <input type="hidden" name="idPromo" id="idPromo">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" id="functionDelete">Delete</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection