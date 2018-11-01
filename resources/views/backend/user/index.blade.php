@extends('backend.general.master')
@extends('backend.user.component.asset')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card m-b-20">
        <div class="card-body">
          
          @if ($message = Session::get('success'))
          {!! Backendhelper::alertsuccess($message) !!}
          <?php Session::forget('success');?>
          @endif

          <h4 class="mt-0 header-title">Data User
            <a href="{{route('formadduser')}}"><button type="button" class="btn btn-outline-success waves-effect waves-light pull-right"><i class="fa fa-plus  "></i> Add</button></a>
          </h4> <br> <hr>
          <strong>Choose a position</strong><br>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item ">
              <a class="nav-link active Position" positionCode='all' data-toggle="tab"   role="tab">All</a>
            </li>
            @foreach ($position as $positionitem)
            <li class="nav-item ">
              <a class="nav-link Position" positionCode="{{$positionitem->kode_jabatan}}" data-toggle="tab"   role="tab">{{$positionitem->nama_jabatan}}</a>
            </li>
            @endforeach
          </ul>
          <div class="tab-content">
            <div class="tab-pane active p-3" id="home" role="tabpanel">
              <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="loaddatauser">
                  @php  $no = 1;  @endphp
                  @foreach($user as $show)
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
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{!!Backendhelper::modal_delete_user()!!}
@endsection
