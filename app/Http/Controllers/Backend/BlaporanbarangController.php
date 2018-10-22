<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
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
      dd($request->param.cat;
    }
}
