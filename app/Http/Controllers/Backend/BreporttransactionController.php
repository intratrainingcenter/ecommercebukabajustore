<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategori;
use Illuminate\Support\Facades\Cache;
use App\Opsi_Retur;
use App\Opsi_Pemesanan;

class BreporttransactionController extends Controller
{
    public function showtransaction()
    {
      $minutes = now()->addMinutes(1);
      $opsi_transaction = Cache::remember('reporttransaction',$minutes, function(){
        return Opsi_Pemesanan::leftjoin('pemesanans', 'opsi_pemesanans.kode_pemesanan', '=', 'pemesanans.kode_pemesanan')->where('status','received')->get();
      });

      $opsi_retur = Cache::remember('reportretur',$minutes, function(){
        return Opsi_Retur::leftjoin('returs', 'opsi_returs.kode_retur', '=', 'returs.kode_retur')->where('status','received')->get();
      });

      $data = array(
        'page' => 'Report Transaction',
        'opsi_transaction' => $opsi_transaction,
        'opsi_retur' => $opsi_retur,
      );
      return view('backend.reporttransaction.index',$data);
    }

    public function showfilter(Request $req)
    {
      $opsi_transaction = [];
      $opsi_retur = [];
      $minutes = now()->addMinutes(1);
      // if select ( Transaction ) , date
      if ($req->category == 'Transaction' && $req->start_date && $req->end_date) {
        $data = Cache::remember('reporttransaction',$minutes, function(){
          return Opsi_Pemesanan::leftjoin('pemesanans', 'opsi_pemesanans.kode_pemesanan', '=', 'pemesanans.kode_pemesanan')->where('status','received')->get();
        });
        $opsi_transaction = $data->where('updated_at','>=',$req->start_date)->where('updated_at','<=',$req->end_date);
      }
      // if select ( Transaction )
      elseif ($req->category == 'Transaction' && empty($req->start_date) && empty($req->end_date)) {
        $opsi_transaction = Cache::remember('reporttransaction',$minutes, function(){
          return Opsi_Pemesanan::leftjoin('pemesanans', 'opsi_pemesanans.kode_pemesanan', '=', 'pemesanans.kode_pemesanan')->where('status','received')->get();
        });
      }
      // if select ( Retur ) , date
      elseif ($req->category == 'Retur' && $req->start_date && $req->end_date) {
        $data = Cache::remember('reporretur',$minutes, function(){
          return Opsi_Retur::leftjoin('returs', 'opsi_returs.kode_retur', '=', 'returs.kode_retur')->where('status','received')->get();
        });
        $opsi_retur = $data->where('updated_at','>=',$req->start_date)->where('updated_at','<=',$req->end_date);
      }
        // if select ( Retur )
      elseif ($req->category == 'Retur'  && empty($req->start_date) && empty($req->end_date)) {
        $opsi_retur = Cache::remember('reporretur',$minutes, function(){
          return Opsi_Retur::leftjoin('returs', 'opsi_returs.kode_retur', '=', 'returs.kode_retur')->where('status','received')->get();
        });
      }
      elseif ($req->category == 'all' && empty($req->start_date) && empty($req->end_date)) {
        $opsi_transaction = Cache::remember('reporttransaction',$minutes, function(){
          return Opsi_Pemesanan::leftjoin('pemesanans', 'opsi_pemesanans.kode_pemesanan', '=', 'pemesanans.kode_pemesanan')->where('status','received')->get();
        });
        $opsi_retur = Cache::remember('reporretur',$minutes, function(){
          return Opsi_Retur::leftjoin('returs', 'opsi_returs.kode_retur', '=', 'returs.kode_retur')->where('status','received')->get();
        });
      }else {
        $data = Cache::remember('reporttransaction',$minutes, function(){
          return Opsi_Pemesanan::leftjoin('pemesanans', 'opsi_pemesanans.kode_pemesanan', '=', 'pemesanans.kode_pemesanan')->where('status','received')->get();
        });
        $opsi_transaction = $data->where('updated_at','>=',$req->start_date)->where('updated_at','<=',$req->end_date);
      }

      $data = array(
        'opsi_transaction' => $opsi_transaction,
        'opsi_retur' => $opsi_retur,
      );

      return view('backend.reporttransaction.transaction',$data);
    }

}
