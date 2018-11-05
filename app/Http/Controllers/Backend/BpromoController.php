<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Promo;
use App\Jobs\SendPromoNotification;

class BpromoController extends Controller
{
  public function index()
  {
    $data = array(
      'page' => 'Promo',
      'dataPromo' => Promo::all(),
    );

    return view('backend.promo.index',$data);
  }

  public function loaddatapromo()
  {
    $data = array(
      'dataPromo' => Promo::all(),
    );
    return view('backend.promo.tabledatapromo',$data);
  }

  public function addpromo()
  {
    $data = array(
      'page' => 'Promo',
    );
    return view('backend.promo.addpromo',$data);
  }

  public function createpromo(Request $request)
  {
    $validatepromo = $request->validate([
      'imagePromo' => 'required',
      'namePromo' => 'required',
      'codePromo' => 'required|unique:master_promos,kode_promo',
      'namePromo' => 'required',
      'minimumPurchase' => 'required',
      'disCount' => 'required',
      'periodStart' => 'required',
      'periodEnd' => 'required',
    ]);

    $createdirectory = Storage::makeDirectory('public/imagepromo');
    $foto = str_replace('data:image/png;base64,', '', $request->imagePromo);
    $foto = str_replace(' ','+',$foto);
    $namefile = str_random(16).'.png';
    Storage::put('public/imagepromo'.'/'.$namefile, base64_decode($foto));

    $createpromo = Promo::create([
      'foto' => $namefile,
      'lokasifoto' => 'public/imagepromo',
      'kode_promo' => $request->codePromo,
      'nama_promo' => $request->namePromo,
      'min_pembelian' => $request->minimumPurchase,
      'diskon' => $request->disCount,
      'berlaku_awal' => $request->periodStart,
      'berlaku_akhir' => $request->periodEnd,
    ]);

    SendPromoNotification::dispatch($request->codePromo);
    return redirect()->route('promoIndex')->with('success','data was successfully added.');
  }

  public function detailpromo($id)
  {
    $data =  array(
      'page' => 'Promo',
      'detailPromo' => Promo::find($id),
    );

    return view('backend.promo.detailpromo',$data);
  }

  public function editpromo($id)
  {
    $data =  array(
      'page' => 'Promo',
      'dataPromo' => Promo::find($id),
    );

    return view('backend.promo.editpromo',$data);
  }

  public function updatepromo(Request $request)
  {

    $validatepromo = $request->validate([
      'namePromo' => 'required',
      'codePromo' => 'required|unique:master_promos,kode_promo,'.$request->id,
      'namePromo' => 'required',
      'minimumPurchase' => 'required',
      'disCount' => 'required',
      'periodStart' => 'required',
      'periodEnd' => 'required',
    ]);


    if($request->imagePromo == null){
      $createpromo = Promo::where('id',$request->id)->update([
        'kode_promo' => $request->codePromo,
        'nama_promo' => $request->namePromo,
        'min_pembelian' => $request->minimumPurchase,
        'diskon' => $request->disCount,
        'berlaku_awal' => $request->periodStart,
        'berlaku_akhir' => $request->periodEnd,
      ]);
    }else{
      $createdirectory = Storage::makeDirectory('public/imagepromo');
      $foto = str_replace('data:image/png;base64,', '', $request->imagePromo);
      $foto = str_replace(' ','+',$foto);
      $namefile = str_random(16).'.png';
      Storage::put('public/imagepromo'.'/'.$namefile, base64_decode($foto));
      $getdatapromo = Promo::find($request->id);
      Storage::delete('public/imagepromo'.'/'.$getdatapromo->foto);

      $createpromo = Promo::where('id',$request->id)->update([
        'foto' => $namefile,
        'kode_promo' => $request->codePromo,
        'nama_promo' => $request->namePromo,
        'min_pembelian' => $request->minimumPurchase,
        'diskon' => $request->disCount,
        'berlaku_awal' => $request->periodStart,
        'berlaku_akhir' => $request->periodEnd,
      ]);
    }

    return redirect()->route('promoIndex')->with('success','data was successfully updated.');
  }

  public function deletepromo(Request $request)
  {
    $deletepromo = Promo::find($request->idPromo);
    Storage::delete('public/imagepromo'.'/'.$deletepromo->foto);
    $deletepromo->delete();

    return 'success';
  }

}
