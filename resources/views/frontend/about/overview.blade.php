  <section class="bg0 p-t-75 p-b-120">
  		<div class="container">
        @php $no=1; @endphp
        @foreach($showabout as $about)

        @if($no++ % 2 == 0 )
          @php $position='left'; @endphp
        @else
          @php $position='right'; @endphp
        @endif
        <div class="row p-b-148">
      @if($position =='left')
      <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
      @endif
  				<div class="col-md-7 col-lg-8">
            @if($position =='left')
            <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
            @else
            <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
            @endif
  						<h3 class="mtext-111 cl2 p-b-16">
  							{{ $about->judul }}
            	</h3>
              <div class="bor16 p-l-29 p-b-9 m-t-22">
      						<p class="stext-113 cl6 p-b-26">
                    {!! $about->deskripsi !!}
      						</p>
              </div>
  					</div>
          </div>
          @if($position =='left')
        </div>

        <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
          <div class="how-bor2">
            <div class="hov-img0">
              <img src="{{ asset('storage/imageabout/'.$about->foto) }}" alt="IMG">
            </div>
          </div>
        </div>
          @else
          <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
  					<div class="how-bor1 ">
  						<div class="hov-img0">
  							<img src="{{ asset('storage/imageabout/'.$about->foto) }}" alt="IMG">
  						</div>
  					</div>
  				</div>
        @endif
      	</div>
        @endforeach

  		</div>
  	</section>
