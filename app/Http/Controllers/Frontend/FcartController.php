<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pemesanan as OrderModel;
use App\Opsi_Pemesanan_Temp as Cart;


class FcartController extends Controller
{
    public function addtocart(Request $request)
    {
    	$codeTransaction = $this->generateCodeTransaction();
    	return $codeTransaction;
    }

    public function generateCodeTransaction()
    {
    	$checkTransaction = OrderModel::where('kode_user',1)->max('id');
    	
    	return $checkTransaction;
    }
}
