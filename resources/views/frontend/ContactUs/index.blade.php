@extends('frontend.general.master')
@section('content')
<section class="sec-product bg0 p-t-100 p-b-50">
    <!-- Product -->
    @if($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{$message}}</p>
        </div>
        @endif
        @if($message = Session::get('warning'))
        <div class="alert alert-danger">
          <p>{{$message}}</p>
        </div>
        @endif
        @if($message = Session::get('danger'))
        <div class="alert alert-warning">
          <p>{{$message}}</p>
        </div>
        @endif

	<div class="container">
    <form action="{{route('ContactUs.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div >
                <fieldset id="exercises">
                  <div class="form-group">
                    <label>email</label>
                    <input type="text" name="email" class="form-control" required="" max="50">
                  </div>
                  <div class="form-group">
                    <label>catatan</label>
                    <textarea name="pesan" class="form-control" rows="10" cols="50">Write something here</textarea>
                  </div>
                  <button type="submit" class="btn btn-success">kirim pesan</button>
                </fieldset>

              </div>
            </form>
    </div>
</section>
@endsection