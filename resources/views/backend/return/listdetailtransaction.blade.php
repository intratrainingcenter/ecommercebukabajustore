<div class="row">
    <div class="col-12">
        <div class="panel panel-default">
            <div class="p-2">
                <h3 class="panel-title font-20"><strong>Return list</strong></h3>
            </div>
            <div class="">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="2"><strong>Product</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity Return</strong></td>
                                <td class="text-right"><strong>Annotation</strong></td>
                                <td class="text-right"><strong>Subtotal</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $subtotal=0;
                            @endphp
                            @foreach($returntransaction->opsiDetailreturn as $itemreturn)
                            <tr>
                                <td colspan="2"> <img src="{{ asset('storage/imageproduct/'.$itemreturn->detailProductreturn->foto)}}" alt="logo" height="42"/>
                                    {{ $itemreturn->detailProductreturn->nama_barang }}
                                </td>
                                <td class="text-center">$ {{ $itemreturn->harga }}</td>
                                <td class="text-center">{{ $itemreturn->qty }}</td>
                                <td class="text-center">{{ $itemreturn->keterangan }}</td>
                                <td class="text-right">$ {{ $itemreturn->subtotal }}</td>
                            </tr>
                            @endforeach
                              <tr>
                                <td colspan="3" class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <strong>Grandtotal</strong></td>
                                    <td class="thick-line text-right"><h4 class="m-0">$ {{ $returntransaction->grandtotal }}</h4></td>
                              </tr>
                                  </tbody>
                              </table>
                          </div>

                                <div class="hidden-print">
                                    <div class="pull-left">
                                        <a href="{{ route('indexReturn') }}" class="btn btn-info waves-effect waves-light">Back</a>
                                    </div>
                                      <div class="pull-right">
                                          @if($returntransaction->status != "received" && $returntransaction->status != "delivery" && $returntransaction->status != "reject")
                                          <button class="btn btn-primary waves-effect waves-light validatereject" attr-code="{{ encrypt($returntransaction->kode_retur) }}">Reject</button>
                                          @endif
                                          @if($returntransaction->status == "Pending")
                                          <button class="btn btn-danger waves-effect waves-light validateProcess" attr-code="{{ encrypt($returntransaction->kode_retur) }}">Process</button>
                                        @elseif($returntransaction->status == "process")
                                          <button class="btn btn-success waves-effect waves-light validateReceived" attr-code="{{ encrypt($returntransaction->kode_retur) }}">Received</button>
                                          @endif
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
