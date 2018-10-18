<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Pemesanan_Temp as TransactionTemp;
use App\Opsi_Pemesanan_Temp as Cart;
use App\Promo;

class FcheckoutController extends Controller
{
	public function index()
	{
		$destinationCity = $this->destinationcity(); 
		$data = array(
			'destinationCity' => $destinationCity,
		);
		return view('frontend.checkout.index',$data);
	}

	public function destinationcity()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 3c8fa461a2974630d8f0a08824fa0401"
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);

		$tojson = json_decode($response,true);
		$results = $tojson['rajaongkir']['results'];

		return $results;
	}

	public function trackcostshipping(Request $request)
	{
		$originCity = 151;
		$destinationcity = $request->destinationCity;

		$incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
		$weightGood = 0;
		$getCart = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->with('detailProduct')->get();
		foreach ($getCart as $itemCart) {
			$weightGood += $itemCart->detailProduct->berat_barang * $itemCart->qty;
		}

		$courier = $request->courier;

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=".$originCity."&destination=".$destinationcity."&weight=".$weightGood."&courier=".$courier,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 3c8fa461a2974630d8f0a08824fa0401"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		$jsonku = json_decode($response,true);
		$service = $jsonku['rajaongkir']['results'];

		curl_close($curl);
		return $service;
	}

	public function checkpromo(Request $request)
	{
		$dateNow = date('Y-m-d');

		$incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
		$subtotal = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->get()->sum('subtotal');

		$resultCheck = Promo::where('kode_promo',$request->promoCode)
							->where('min_pembelian','<=',$subtotal)
							->whereRaw('"'. $dateNow .'" between master_promos.berlaku_awal and master_promos.berlaku_akhir')
							->get()
							->isNotEmpty();
						
		if($resultCheck){
			return 1;
		}else{
			return 0;
		}

	}

	public function getlistcart()
	{
		$incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
		$listCart = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->with('detailProduct')->get();
		return $listCart;
	}
}
