 @php
 $no = 1;
 @endphp
 @foreach($data as $showitem)
   <tr>
       <td>{{$no++}}</td>
       <td><img src="{{$showitem->foto}}" alt="" style="width:100px; height:100px;"></td>
       <td>{{$showitem->created_by}}</td>
       <td><i class="badge badge-success">{{$showitem->status}}</i></td>
       <td>
           {!!Backendhelper::story_read_update_delete_byid($showitem->id,route('storyUpdate',['id'=>$showitem->id]),route('storyDetail',['id'=>$showitem->id]))!!}
       </td>
   </tr>
@endforeach
