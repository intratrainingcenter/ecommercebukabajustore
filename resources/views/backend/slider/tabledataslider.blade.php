 @php
 $no = 1;
 @endphp
 @foreach($dataslider as $itemslider)
 <tr>
 	<td>{{ $no++ }}</td>
 	<td><img width='130px' height='130px' src="{{ asset('storage/imageslider'.'/'.$itemslider->foto) }}" alt=""></td>
 	<td>{{$itemslider->status}}</td>
 	<td>{!!Backendhelper::read_update_delete_byid($itemslider->id,route('sliderEdit',['id'=>$itemslider->id]),route('sliderDetail',['id'=>$itemslider->id]))!!}</td>
 </tr>
 @endforeach