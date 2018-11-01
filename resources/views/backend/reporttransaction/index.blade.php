@extends('backend.general.master')
@extends('backend.reporttransaction.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                  <a  onclick="printDiv('print')" type="button" class="btn btn-primary pull-right" name="button" title="Print"><i class="fa fa-print"></i></a><br><br><br>
                  <div class="tab-content">
                    <div class="tab-pane active p-3" id="home" role="tabpanel">
                    <div class="row">
                    <div class="col-2">
                      <select class="btn btn-primary select_transaction">
                        <option value="all">Category All</option>
                        <option value="Retur">Retur</option>
                        <option value="Transaction">Transaction</option>
                      </select>
                    </div>
                    <div class="col-10">
                      <div class="form-group">
                          <div>
                              <div class="input-daterange input-group" id="date-range">
                                  <input type="date" class="form-control startdate">
                                  <span class="input-group-addon b-0">to</span>
                                  <input type="date" class="form-control enddate">
                              </div>
                          </div>
                      </div>
                    </div>
                  </div><hr>
                  <div id="print">
                      <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Code Transaction</th>
                                  <th>Name Produck</th>
                                  <th>Total Product</th>
                                  <th>Sub Total</th>
                              </tr>
                          </thead>
                          <tbody class="loaddatareport">
                            @php $no=1; @endphp
                              @foreach ($opsi_transaction as $show)
                              <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $show->kode_pemesanan }}</td>
                                <td>{{ $show->kode_barang }}</td>
                                <td>{{ $show->qty }}</td>
                                <td>${{ $show->subtotal }}</td>
                              </tr>
                              @endforeach
                              @foreach ($opsi_retur as $show)
                              <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $show->kode_retur }}</td>
                                <td>{{ $show->kode_barang }}</td>
                                <td>{{ $show->qty }}</td>
                                <td>${{ $show->subtotal }}</td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
