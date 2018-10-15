<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Pemesanan_Temp as TransactionTemp;
use App\Opsi_Pemesanan_Temp as Cart;

class FcheckoutController extends Controller
{
	public function index()
	{
		$destinationCity = $this->destinationcity(); 
		$listCart = $this->getlistcart();
		$data = array(
			'destinationCity' => $destinationCity,
			'listCart' => $listCart,
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
		// $weightgood = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->get()->sum('berat_barang');
		
		$weightgood = 20;

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
			CURLOPT_POSTFIELDS => "origin=".$originCity."&destination=".$destinationcity."&weight=".$weightgood."&courier=".$courier,
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
	public function getlistcart()
	{
		$incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
		$listCart = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->with('detailProduct')->get();
		return $listCart;
	}
}
