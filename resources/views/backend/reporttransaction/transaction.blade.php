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
