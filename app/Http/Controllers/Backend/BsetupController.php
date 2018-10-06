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
		return view('backend.setup.index');
	}

	public function postsetup(Request $request)
	{
		$validateSetup = $request->validate([
			'imageSetup' => 'required',
			'nameWebsite' => 'required',
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
			'alamat' => $request->address,
			'no_telp' => $request->contactNumber,
			'email' => $request->email,
			'deskripsi' => $request->description,
		]);

		return redirect()->route('dashboardIndex');
	}
}
