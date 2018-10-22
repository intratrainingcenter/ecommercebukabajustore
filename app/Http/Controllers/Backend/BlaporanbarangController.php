<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Kategori;

class BlaporanbarangController extends Controller
{
    public function index()
    {
      $data = array(
        'page'      => 'Laporan Barang',
        'category'  => Kategori::all(),
      );
      return view('backend.laporanbarang.index',$data);
    }

    public function category(Request $request)
    {
      $code = $request->codecategory;
      $minutes = now()->addMinutes(1);
      $data = Cache::remember('items', $minutes, function () use($code){
          return DB::table('master_barangs')->where('kode_kategori',$code)->get();
      });
      return $data;
    }
}
