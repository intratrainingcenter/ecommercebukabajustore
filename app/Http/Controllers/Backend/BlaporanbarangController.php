<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
