<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
      $data = Cache::remember('productreport', $minutes, function (){
        return DB::table('master_barangs')->get();
      });

      return $data->where('kode_kategori',$code);
    }

    public function getdataproduck(Request $request)
    {
        $data = Cache::get('productreport', function(){
          return DB::table('master_barangs')->get();
        });
        return $data;
    }

    public function filterwithdate(Request $request)
    {
      $dateStart = $request->start;
      // add onedays to enddate
      $dateEnd = Carbon::parse($request->end)->addDays(1);
      $idcategory = $request->idcategory;
      $minutes = now()->addMinutes(1);

      $data = Cache::remember('productreport',$minutes, function(){
        return DB::table('master_barangs')->get();
      });
        if ($idcategory == null) {
            $filter = $data->where('updated_at','>=',$dateStart)->where('updated_at','<=',$dateEnd);
        }else{
            $filter = $data->where('kode_kategori',$idcategory)->where('updated_at','>=',$dateStart)->where('updated_at','<=',$dateEnd);
        }

      return $filter;
    }
}
