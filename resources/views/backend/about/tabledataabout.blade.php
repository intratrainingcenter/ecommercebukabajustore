@php
    $no = 1;
@endphp
@foreach($dataAbout as $itemAbout)
<tr>
    <td>{{ $no++ }}</td>
    <td>{{ $itemAbout->foto }}</td>
    <td>{{ $itemAbout->judul }}</td>
    <td> {{ $itemAbout->status }}</td>
    <td>{!!Backendhelper::read_update_delete_byid($itemAbout->id,route('aboutEdit',['id'=>$itemAbout->id]),route('aboutDetail',['id'=>$itemAbout->id]))!!}</td>
</tr>
@endforeach
