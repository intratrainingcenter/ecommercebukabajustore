@php $no=1; @endphp
@foreach ($product as $data)
      <tr>
        <td> {{ $no++ }} </td>
        <td> {{ $data->kode_barang }} </td>
        <td> {{ $data->category->nama_kategori }} </td>
        <td> {{ $data->nama_barang }} </td>
        <td> {{ $data->stok }} </td>
        <td> {!!Backendhelper::read_update_delete_byid($data->id,route('formupdateProduct',['id'=>$data->id]),route('detailProduct',['id'=>$data->id]))!!} </td>
      </tr>
  @endforeach
