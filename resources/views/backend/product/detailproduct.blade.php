@extends('backend.general.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Product</h4>
                    <br>
                    <hr>
                    <div class="row">

                    <div class="col-8">
                        <div class="card m-b-20">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">{{ $product->nama_barang }}</h4>
                                <p class="text-muted m-b-30 font-14"> {{ $product->deskripsi }} </p>
                                <div class="">
                                    <img src="{{ asset('storage/imageproduct/'.$product->foto) }}" class="img-fluid" alt="Responsive image">
                                </div>
                            </div>
                        </div>
                    </div>
             <div class="col-4">
               <br><br>
                     <div class="col-12">
                           <address>
                               <strong>Code Product :</strong><br>
                               <h4> {{ $product->kode_barang }} </h4>
                           </address>
                     </div>
                      <div class="col-12">
                            <address>
                                <strong>Category Product :</strong><br>
                                <h4> {{ $product->kode_kategori }} </h4>
                            </address>
                      </div>
                      <div class="col-12">
                            <address>
                                <strong>Weight Product :</strong><br>
                                <h4> {{ $product->berat_barang }} gram </h4>
                            </address>
                      </div>
                      <div class="col-12">
                            <address>
                                <strong>Stock Product :</strong><br>
                                <h4> {{ $product->kode_kategori }} </h4>
                            </address>
                      </div>
                      <div class="col-12">
                            <address>
                                <strong>Purchase Price Product :</strong><br>
                                <h4> $ {{ $product->hpp }} </h4>
                            </address>
                      </div>
                      <div class="col-12">
                            <address>
                                <strong>Seliing Price Product :</strong><br>
                                <h4> $ {{ $product->harga_jual }} </h4>
                            </address>
                      </div>
                  </div>
                  <a href="{{route('productIndex')}}">
                     <button type="button" class="btn btn-success waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                 </a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
