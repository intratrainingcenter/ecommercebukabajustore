<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Jabatan;

class BpositionController extends Controller
{
	public function index()
	{

		$data = array(
			'page' => 'Position',
			'dataPosition' => Jabatan::all(),
		);

		return view('backend.position.index',$data);
	}

	public function loaddataposition()
	{
		$data = array(
			'dataPosition' => Jabatan::all(),
		);
		return view('backend.position.tabledataposition',$data);
	}

	public function addposition()
	{
		$data = array(
			'page' => 'Position',
		);
		return view('backend.position.addposition',$data);
	}

	public function createposition(Request $request)
	{
		$validatePosition = $request->validate([
			'codePosition' => 'required|unique:master_jabatans,kode_jabatan',
			'namePosition' => 'required',
		]);

		$createpromo = Jabatan::create([
			'kode_jabatan' => $request->codePosition,
			'nama_jabatan' => $request->namePosition,
		]);

		return redirect()->route('positionIndex')->with('success','data was successfully added.'); 
	}

	public function detailposition($id)
	{
		$data =  array(
			'page' => 'Position',
			'detailPosition' => Jabatan::find($id),
		);

		return view('backend.position.detailposition',$data);
	}

	public function editposition($id)
	{
		$data =  array(
			'page' => 'Position',
			'dataPosition' => Jabatan::find($id),
		);

		return view('backend.position.editposition',$data);
	}

	public function updateposition(Request $request)
	{

		$validatePosition = $request->validate([
			'codePosition' => 'required|unique:master_jabatans,kode_jabatan,'.$request->id,
			'namePosition' => 'required',
		]);


		$createPosition = Jabatan::where('id',$request->id)->update([
			'kode_jabatan' => $request->codePosition,
			'nama_jabatan' => $request->namePosition,
		]);

		return redirect()->route('positionIndex')->with('success','data was successfully updated.'); 
	}

	public function deleteposition(Request $request)
	{
		$deleteposition = Jabatan::destroy($request->idPosition);
		return 'success';
	}
}
