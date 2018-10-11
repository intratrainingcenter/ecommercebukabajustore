 @php
 $no = 1;
 @endphp
 @foreach($dataPromo as $itemPromo)
 <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $itemPromo->kode_promo }}</td>
    <td>{{ $itemPromo->nama_promo }}</td>
    <td> {{ $itemPromo->berlaku_awal }} - {{ $itemPromo->berlaku_akhir }}</td>
    <td>{!!Backendhelper::promo_read_update_delete_byid($itemPromo->id,'promo')!!}</td>
</tr>
@endforeach