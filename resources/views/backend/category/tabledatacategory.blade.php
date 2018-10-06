 @php
 $no = 1;
 @endphp
 @foreach($dataCategory as $itemCategory)
 <tr>
 	<td>{{ $no++ }}</td>
 	<td>{{ $itemCategory->kode_kategori}}</td>
 	<td>{{ $itemCategory->nama_kategori}}</td>
 	<td>{!!Backendhelper::read_update_delete_byid($itemCategory->id,route('categoryEdit',['id'=>$itemCategory->id]),route('categoryDetail',['id'=>$itemCategory->id]))!!}</td>
 </tr>
 @endforeach
