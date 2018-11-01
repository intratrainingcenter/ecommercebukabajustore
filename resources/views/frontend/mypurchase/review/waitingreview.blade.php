@forelse($showreview as $review)
{{Form::open(['route'=>'addReview','method'=>'post'])}}
<tr class="table_row" style="margin-top: 0px;">
    <td style="padding:20px"><center>
      <input type="hidden" name="id" value="{{ $review->id   }}">
            <img height="180px" src="{{ asset('storage/imageproduct/'.$review->relationproduct->foto) }}">
            <a href="{{ route('frontdetailProduct',['id'=>encrypt($review->relationproduct->id)]) }}">
                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                 {{ $review->relationproduct->nama_barang }}
                </h4>
            </a>
    </center></td>
    <td><center>
      <div class="col-sm-12 col-lg-12 has-primary">
          <div class="p-4 text-center">
              <h5 class="font-16 m-b-15">Rating</h5>
              <input type="hidden" name="rating" class="rating-tooltip" data-filled="mdi mdi-star font-32 text-primary" data-empty="mdi mdi-star-outline font-32 text-muted" value="0"/>
              @if($errors->has('rating')) <div class="form-control-feedback">Rating can not be empty</div> @endif
          </div>
      </div>
    </center>  </td>
    <td style="padding:20px">
    <center>    <div class="bor8 m-b-30">
        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="description" placeholder="Enter Review"></textarea>
      </div>
      <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
            Submit Review
      </button>
  </center> </td>
  </tr>
  {{Form::close()}}
  @empty

  @endforelse
