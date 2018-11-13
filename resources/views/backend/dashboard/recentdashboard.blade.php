<div class="row">

    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 m-b-15 header-title">Recent Transaction Received</h4>
                <div class="table-responsive">
                    <table class="table table-hover m-b-0">
                        <thead>
                            <tr>
                                <th>Code Transaction</th>
                                <th>Order On</th>
                                <th>Received On</th>
                                <th>Grandtotal</th>
                            </tr>

                        </thead>
                        <tbody>
                            @forelse($transactionReceived as $itemReceived)
                            <tr>
                                <td>{{ $itemReceived->kode_pemesanan }}</td>
                                <td>{{ $itemReceived->tgl_pemesanan }}</td>
                                <td>{{ $itemReceived->tgl_diterima }}</td>
                                <td>$ {{ $itemReceived->grandtotal }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="text-align: center;">Empty data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>