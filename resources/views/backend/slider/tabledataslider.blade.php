 @php
 $no = 1;
 @endphp
 @foreach($dataslider as $itemslider)
 <tr>
    <td>{{ $no++ }}</td>
    <td>{{$itemslider->created_by}}</td>
    <td>{{$itemslider->deskripsi}}</td>
    <td>{{$itemslider->status}}</td>
    <td>{!!Backendhelper::slider_read_update_delete_byid($itemslider->id,'slider')!!}</td>
</tr>
@endforeach