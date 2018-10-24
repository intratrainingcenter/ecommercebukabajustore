@extends('backend.general.master')
@extends('backend.laporanbarang.component.asset')
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
                      <select class="btn btn-primary optionCategory" title="Select Category Produck">
                        <option value="">Category All</option>
                        @foreach ($category as $items)
                          <option value="{{$items->kode_kategori}}">{{$items->nama_kategori}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-10">
                      <div class="form-group">
                          <div>
                              <div class="input-daterange input-group" id="date-range">
                                  <input type="date" class="form-control" name="start" title="Start Date">
                                  <span class="input-group-addon b-0">to</span>
                                  <input type="date" class="form-control" name="end" title="End Date">
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
                                  <th>Name Produck</th>
                                  <th>Hpp</th>
                                  <th>selling price</th>
                                  <th>Last Stock</th>
                              </tr>
                          </thead>
                          <tbody class="loaddatareportproduct">

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
