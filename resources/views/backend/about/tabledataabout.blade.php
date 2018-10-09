@php
    $no = 1;
@endphp
@foreach($dataAbout as $itemAbout)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $itemAbout->judul }}</td>
    <td><i class=@if ($itemAbout->status == 'Active')"badge badge-success" @else "badge badge-primary" @endif >{{$itemAbout->status}}</i></td>
    <td>{!!Backendhelper::read_update_delete_byid($itemAbout->id,route('aboutEdit',['id'=>$itemAbout->id]),route('aboutDetail',['id'=>$itemAbout->id]))!!}</td>
</tr>
@endforeach
