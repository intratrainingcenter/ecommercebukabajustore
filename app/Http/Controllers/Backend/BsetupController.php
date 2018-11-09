<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\setting;
class BsetupController extends Controller
{
	public function __construct()
	{
		// $this->middleware('auth');
	}
	public function index()
	{
		if (setting::count() >= 1) {
			return redirect('/dashboard');
		}
		$dataCity = $this-> getcity();

		$selectCity=[];
		$selectCity['']='Choose City';
		foreach ($dataCity as $itemCity) {
			$selectCity[$itemCity['city_id']]=$itemCity['city_name'];
		}

		$data = array(
			'selectCity' => $selectCity
		);

		return view('backend.setup.index',$data);
	}

	public function postsetup(Request $request)
	{
		$validateSetup = $request->validate([
			'imageSetup' => 'required',
			'nameWebsite' => 'required',
			'city' => 'required',
			'address' => 'required',
			'contactNumber' => 'required',
			'email' => 'required',
			'description' => 'required',
		]);

		$createdirectory = Storage::makeDirectory('public/imagesetup');
		$foto = str_replace('data:image/png;base64,', '', $request->imageSetup);
		$foto = str_replace(' ','+',$foto);
		$namefile = str_random(16).'.png';
		Storage::put('public/imagesetup'.'/'.$namefile, base64_decode($foto));

		$createSetup = setting::create([
			'foto' => $namefile,
			'lokasifoto' => 'public/imagesetup',
			'nama_web' => $request->nameWebsite,
			'id_kota' => $request->city,
			'alamat' => $request->address,
			'no_telp' => $request->contactNumber,
			'email' => $request->email,
			'deskripsi' => $request->description,
		]);

		return redirect()->route('dashboardIndex');
	}

	public function getcity()
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
}
