@forelse($showreview as $review)
  <tr class="table_row" style="margin-top: 0px;">
  <td style="padding:20px"><center>
      <input type="hidden" name="idrating" value="{{ $review->id }}">
            <img height="180px" src="{{ asset('storage/imageproduct/'.$review->relationproduct->foto) }}">
            <a href="{{ route('frontdetailProduct',['id'=>encrypt($review->relationproduct->id)]) }}">
                <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                 {{ $review->relationproduct->nama_barang }}
                </h4>
            </a>
     </center></td>
    <td><center>
      <div class="col-sm-12 col-lg-12">
          <div class="p-4 text-center">
              <h5 class="font-16 m-b-15">Rating</h5>
              <input type="hidden" data-readonly name="rating" class="rating-tooltip" data-filled="mdi mdi-star font-32 text-primary" data-empty="mdi mdi-star-outline font-32 text-muted" value="{{ $review->rating }}"/>
          </div>
      </div></center>
    </td>
    <td style="padding:20px"><center>
      <p> {{ $review->isi_ulasan }} </p>
  </center>  </td>
  </tr>
  @empty
  @endforelse
