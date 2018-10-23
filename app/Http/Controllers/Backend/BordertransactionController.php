<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Pemesanan;
Use App\Opsi_Pemesanan;
Use App\Ulasan;


class BordertransactionController extends Controller
{
	public function index()
	{
		$data = array(
			'page' => 'Order Transaction',
			'dataOrder' => Pemesanan::orderBy('updated_at','desc')->get(),
		);
		
		return view('backend.ordertransaction.index',$data);
	}

	public function detailorder(Request $request)
	{
		$idTransaction = decrypt($request->id);
		
		$detailOrder = Pemesanan::where('id',$idTransaction)->with(['detailUser','shippingService','detailPromo','opsiDetailHistory' => function ($query)
    	{
    		$query->with('detailProduct');
    	}])->first();

		$data = array(
			'page' => 'Order Transaction',
			'detailOrder' => $detailOrder,
		);

		return view('backend.ordertransaction.detail',$data);
	}

	public function validationprocess(Request $request)
	{
		$codeTransaction = decrypt($request->codeProcess);

		$validationProcess = Pemesanan::where('kode_pemesanan',$codeTransaction)->update([
			'status' => 'process',
		]);
		
		return redirect()->route('ordertransactionIndex')->with('success','Process Validation transaction '.$codeTransaction.' Successsfull');
	}

	public function validationdelivery(Request $request)
	{
		$codeTransaction = decrypt($request->codeDelivery);

		$validationProcess = Pemesanan::where('kode_pemesanan',$codeTransaction)->update([
			'status' => 'delivery',
		]);
		
		return redirect()->route('ordertransactionIndex')->with('success','Delivery Validation transaction '.$codeTransaction.' Successsfull');
	}

	public function validationreceived(Request $request)
	{
		$codeTransaction = decrypt($request->codeReceived);

		$itemsTransaction = $this->getcart($codeTransaction);

		// foreach ($itemsTransaction as $itemTransaction) {
		// 	$addToReview = Ulasan::create([
		// 		'kode_pemesanan' => $itemTransaction->kode_pemesanan,
		// 		'kode_user' => Auth::user()->kode_user,
		// 		'kode_barang' => $itemTransaction->kode_barang,
		// 		'status' => 'belum',
		// 	]);
		// }

		$validationProcess = Pemesanan::where('kode_pemesanan',$codeTransaction)->update([
			'status' => 'received',
		]);
		
		return redirect()->route('ordertransactionIndex')->with('success','Received Validation transaction '.$codeTransaction.' Successsfull');
	}

	public function validationcancel(Request $request)
	{
		$codeTransaction = decrypt($request->codeCancel);
		$itemsTransaction = $this->getcart($codeTransaction);

		$validationProcess = Pemesanan::where('kode_pemesanan',$codeTransaction)->update([
			'keterangan' => $request->explaNation,
			'status' => 'cancel',
		]);
		
		return redirect()->route('ordertransactionIndex')->with('success','Canceled Validation transaction '.$codeTransaction.' Successsfull');
	}

	public function getcart($codeTransaction)
	{
		$getCart = Opsi_Pemesanan::where('kode_pemesanan',$codeTransaction);
		return $getCart;
	}
}
