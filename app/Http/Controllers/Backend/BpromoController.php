<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Promo;
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
    $namafile = str_random(16).'.png';
    Storage::put('public/imagepromo'.'/'.$namafile, base64_decode($foto));

    $createpromo = Promo::create([
        'foto' => $namafile,
        'lokasifoto' => 'public/imagepromo',
        'kode_promo' => $request->codePromo,
        'nama_promo' => $request->namePromo,
        'min_pembelian' => $request->minimumPurchase,
        'diskon' => $request->disCount,
        'berlaku_awal' => $request->periodStart,
        'berlaku_akhir' => $request->periodEnd,
    ]);

    return redirect()->route('promoIndex'); 
}

public function loaddatapromo()
{
    $data = array(
        'dataPromo' => Promo::all(),
    );
    return view('backend.promo.tabledatapromo',$data);
}

public function deletepromo(Request $request)
{
    $deletepromo = Promo::find($request->idPromo);
    Storage::delete('public/imagepromo'.'/'.$deletepromo->foto);
    $deletepromo->delete();

    return 'success';
}

public function detailpromo($id)
{
   $data =  array(
      'page' => 'Promo',
  );

   return view('backend.promo.detailpromo',$data);
}
}
