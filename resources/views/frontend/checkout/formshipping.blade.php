<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
	<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
		<h4 class="mtext-109 cl2 p-b-30">
			Cart Totals
		</h4>
		<div class="flex-w flex-t bor12 p-t-15 p-b-30">
			<div class="size-208 w-full-ssm">
				<span class="stext-110 cl2">
					Shipping:
				</span>
			</div>

			<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
				<p class="stext-111 cl6 p-t-2">
					There are no shipping methods available. Please double check your address, or contact us if you need any help.
				</p>

			</div>
				<div class="p-t-15">
					<span class="stext-112 cl8">
						Select Destination Shipping
					</span>

					<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9 select2">
						<select class="js-select2" name="destination">
							<option value="">Select Destination</option>
							@foreach($destinationCity as $city)
							<option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
							@endforeach
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9 select2">
						<select class="js-select2" name="courier">
							<option>Select Courier</option>
							<option>JNE</option>
							<option>TIKI</option>
							<option>POS</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
					<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9 select2">
						<select class="js-select2" name="courier">
							<option>Select Service</option>
							<option>JNE</option>
							<option>TIKI</option>
							<option>POS</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="bor8 m-b-30">
					<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Enter Your Address (explanation)"></textarea>
				</div>
		</div>
		<br>
		<div class="flex-w flex-t bor12 p-b-13">
			<div class="size-209">
				<span class="stext-110 cl2">
					Subtotal
				</span>
			</div>
			<div class="size-208">
				<span class="mtext-110 cl2">
					$50.00
				</span>
			</div>
			<div class="size-209">
				<span class="stext-110 cl2">
					Shipping Cost
				</span>
			</div>
			<div class="size-208">
				<span class="mtext-110 cl2">
					$0.00
				</span>
			</div>
		</div>
		<div class="flex-w flex-t p-t-27 p-b-33">
			<div class="size-209 p-t-1">
				<div class="bor8 bg0 m-b-22">
					<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="promoCode" placeholder="Enter Code Promo">
				</div>
			</div>
			<div class="size-208">
				<div class="flex-c-m stext-60 cl2 size-112 bg8  hov-btn3 p-lr-15 trans-04 pointer">
					Check Promo
				</div>
			</div>
		</div>
		<div class="flex-w flex-t p-t-27 p-b-33">
			<div class="size-209">
				<span class="mtext-101 cl2">
					Total:
				</span>
			</div>

			<div class="size-208 p-t-1">
				<span class="mtext-110 cl2">
					$79.65
				</span>
			</div>
		</div>
		<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
			Proceed to Payment
		</button>
	</div>
</div>