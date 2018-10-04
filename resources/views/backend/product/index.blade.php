@extends('backend.general.master')
@extends('backend.product.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Data Product
                        <a href="{{route('formaddProduct')}}"><button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Add</button></a>
                    </h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code Product</th>
                                <th>Category</th>
                                <th>Name Product</th>
                                <th>Stock</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php $no=1; @endphp
                          @forelse ($product as $data)
                                <tr>
                                  <td> {{ $no++ }} </td>
                                  <td> {{ $data->kode_barang }} </td>
                                  <td> {{ $data->kode_kategori }} </td>
                                  <td> {{ $data->nama_barang }} </td>
                                  <td> {{ $data->stok }} </td>
                                  <td> {!!Backendhelper::product_detail_update_delete_bycode($data->kode_barang)!!} </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Empty Data Product</td>
                                </tr>
                            @endforelse
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
              <p>Code Product  <b class="codeproduct"></b></p>
            </div>
            <div class="modal-footer">
              {{Form::open(['route'=>'deleteProduct','method'=>'delete'])}}
              {{ Form::hidden('codeProduct',null,['class'=>'codeproduct']) }}
              {{Form::button('Cancel',['type'=>'button','class'=>'btn btn-secondary waves-effect','data-dismiss'=>'modal'])}}
              {{Form::button('Delete',['type'=>'submit','class'=>'btn btn-primary waves-effect waves-light'])}}
              {{Form::close()}}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
