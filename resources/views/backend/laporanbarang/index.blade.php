@extends('backend.general.master')
@extends('backend.laporanbarang.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active p-3" id="home" role="tabpanel">
                    <div class="row">
                    <div class="col-2">
                      <select class="btn btn-primary  " name="">
                        <option value="">Category All</option>
                        @foreach ($category as $items)
                          <option value="{{$items->kode_kategori}}">{{$items->nama_kategori}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-8">
                      <div class="form-group">
                          <div>
                              <div class="input-daterange input-group" id="date-range">
                                  <input type="date" class="form-control" name="start">
                                  <span class="input-group-addon b-0">to</span>
                                  <input type="date" class="form-control" name="end">
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-2">
                      <button type="button" class="btn btn-primary" name="button">Search</button>
                    </div>
                  </div><hr>
                      <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>User Name</th>
                                  <th>Address</th>
                                  <th>Position</th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody class="loaddatauser">

                          </tbody>
                      </table>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
