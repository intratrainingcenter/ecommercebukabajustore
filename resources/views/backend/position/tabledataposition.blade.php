 @php
 $no = 1;
 @endphp
 @foreach($dataPosition as $itemPosition)
 <tr>
 	<td>{{ $no++ }}</td>
 	<td>{{ $itemPosition->kode_jabatan}}</td>
 	<td>{{ $itemPosition->nama_jabatan}}</td>
 	<td>{!!Backendhelper::read_update_delete_byid($itemPosition->id,route('positionEdit',['id'=>$itemPosition->id]),route('positionDetail',['id'=>$itemPosition->id]))!!}</td>
 </tr>
 @endforeach