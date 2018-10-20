@extends('backend.general.master')
@extends('backend.story.component.asset')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Detail Story</h4>
                    <br>
                    <hr>
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col-4">
                            <img src="{{ asset('storage/imagestory'.'/'.$detailstory->foto) }}">
                        </div>
                        <div class="col-8">
                            <address>
                              <strong>User Upload : </strong><br>
                              <div class="custom-dd dd">
                                   <div class="dd-list">
                                       <div class="dd-item">
                                           <div class="dd-handle">
                                             <p >{{ $detailstory->created_by }}</p><br>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                             </address>
                                <address>
                                    <strong>Judul : </strong><br>
                                    <div class="custom-dd dd">
                                         <div class="dd-list">
                                             <div class="dd-item">
                                                 <div class="dd-handle">
                                                   <p>{{ $detailstory->judul }}</p><br>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                </address>
                                <address>
                                    <strong>Status : </strong><br>
                                    <div class="custom-dd dd">
                                         <div class="dd-list">
                                             <div class="dd-item">
                                                 <div class="dd-handle">
                                                   <p>{{ $detailstory->status }}</p><br>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                </address>
                                <address>
                                    <strong>Deskripsi :</strong><br>
                                    <div class="custom-dd dd">
                                         <div class="dd-list">
                                             <div class="dd-item">
                                                 <div class="dd-handle">
                                                   <p>{!! $detailstory->deskripsi !!}</p><br>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                </address>
                            </div>
                        </div>
                         <a href="{{route('storyIndex')}}">
                            <button type="button" class="btn btn-warning waves-effect waves-light"><i class="fa fa-arrow-left"></i> Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
