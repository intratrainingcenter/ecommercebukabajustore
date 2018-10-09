<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pemesanan as TransactionHistory;
use App\Pemesanan_Temp as TransactionTemp;
use App\Opsi_Pemesanan_Temp as Cart;


class FcartController extends Controller
{
    public function addtocart(Request $request)
    {
        // Check table pemesanan apakah ada transaksi berstatus 'incart'
        $incartTransactionTemp = TransactionTemp::where([['kode_user',1],['status','incart']])->get();
        if($incartTransactionTemp->isEmpty()){
            $codeTransaction = $this->generateCodeTransaction();
        }else{
            $codeTransaction = $incartTransactionTemp->kode_pemesanan;
        }
    	return $codeTransaction;
    }

    public function generateCodeTransaction()
    {
        $checkTransactionHistory = TransactionHistory::where('kode_user',1)->max('kode_pemesanan');
    	$checkTransactionTemp = TransactionTemp::where('kode_user',1)->max('kode_pemesanan');

        $codeMaxHistory = (!is_null($checkTransactionHistory))?$checkTransactionHistory:null;
        $codeMaxTemp = (!is_null($checkTransactionTemp))?$checkTransactionTemp:null;

        $sequenceHistory = (!is_null($codeMaxHistory))?substr($codeMaxHistory, 18):0; 
        $sequenceTemp = (!is_null($codeMaxTemp))?substr($codeMaxTemp, 18):0; 

        $sequence = ($sequenceTemp >= $sequenceHistory)?$sequenceTemp:$sequenceHistory;


        $sequence+=1;   

        $now=date("ymdhis");

        // $codeTransaction = 'TR-'.$now.'U'.iduserauth.'M'.$sequence;
        $codeTransaction = 'TR-'.$now.'U'.'1'.'M'.$sequence;
    	
    	return $codeTransaction;
    }
}
