@php  $no = 1;  @endphp
@foreach($position as $show)
  <tr>
      <td>{{$no++}}</td>
      <td>{{$show->name}}</td>
      <td>{{$show->alamat}}</td>
      <td>{{$show->position->nama_jabatan}}</td>
      <td><i class=@if ($show->status == 'Active')"badge badge-success" @else "badge badge-primary" @endif >{{$show->status}}</i></td>
      <td>
          {!!Backendhelper::story_read_update_delete_byid($show->id,route('formuserUpdate',['id'=>$show->id]),route('userDetail',['id'=>$show->id]))!!}
      </td>
  </tr>
@endforeach
