<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Retur as ReturnProduct;
use App\setting;

class BreturnController extends Controller
{
  public function index()
  {
    $returnTransaction = ReturnProduct::with('userMember')->get();
    $data = array(
      'page'          => 'Return Product',
      'returnProduct' => $returnTransaction,
    );
    return view('backend.return.index',$data);
  }

  public function returnProcess(Request $request)
  {
    $codereturn = decrypt($request->codereturn);
    $returnTransaction = ReturnProduct::where('kode_retur',$codereturn)->with(['userMember','opsiDetailreturn'=> function($query)
    {
      $query->with('detailProductreturn');
    }])->first();

    $setting = setting::first();
    $data = array(
      'page'              => 'Detail Return Transaction',
      'setting'      => $setting,
      'returntransaction' => $returnTransaction,
    );
    return view('backend.return.detailreturn',$data);
  }

  public function validationReturn(Request $request)
  {
    switch ($request->opsi) {
      case 'process':
      $codereturn = decrypt($request->codeProcessReturn);
      $processReturn = ReturnProduct::where('kode_retur', $codereturn)->update([
        'status'  => 'process',
      ]);
      return redirect('Return')->with('process','success');
      break;
      case 'received':
      $codereturn = decrypt($request->codeReceivedReturn);
      $processReturn = ReturnProduct::where('kode_retur', $codereturn)->update([
        'cashback'  => $request->cashback,
        'status'    => 'received',
      ]);
      return redirect('Return')->with('received','success');
      break;
      case 'reject':
      $codereturn = decrypt($request->codeRetunReject);
      $processReturn = ReturnProduct::where('kode_retur', $codereturn)->update([
        'keterangan'  => $request->explaNation,
        'status'      => 'reject',
      ]);
      return redirect('Return')->with('reject','success');
      break;
    }
  }
}
