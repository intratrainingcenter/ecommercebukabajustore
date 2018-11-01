@extends('backend.general.master')
@section('content')
<section class="sec-product bg0 p-t-100 p-b-50">
<div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Data Message
                    </h4>
                    <br>
                    <hr>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>email</th>
                                <th>Message</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="dataslider">
                            @php
                                $no = 1;
                            @endphp

							@foreach($datacontact as $itemcontact)
                            <tr>
								<td>{{ $no++ }}</td>
								<td>{{$itemcontact->email}}</td>
								<td>
									{{substr($itemcontact->pesan,0,35)}}
								</td>
                                <td><a href="{{route('ContactBack.show',$itemcontact->id)}}"><button type="button" class="btn btn-outline-info waves-effect waves-light pull-right" style="margin-right: 10px;" title="Detail"><i class="fa fa-search"></i></button></a></td>
							</tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection