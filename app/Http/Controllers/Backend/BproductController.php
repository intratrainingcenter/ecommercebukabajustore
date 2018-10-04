<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
// memanggil cntrller di dalam cntrller, karna ada didlama directory backend
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Barang;

class BproductController extends Controller
{
    public function index()
   {
     $product = DB::table('master_barangs')->get();
     $data = array(
       'page' => 'Product',
       'product' => $product,
     );

     return view('backend.product.index',$data);
   }

   public function formaddproduct()
  {
    $category = DB::table('master_kategoris')->get();
      $select=[];
      $select['']='Choose Category';
// foreach data kategori array
    foreach ($category as $key) {
      $select[$key->kode_kategori]=$key->nama_kategori;
    }

    $data = array(
      'page' => 'Product',
      'category' => $select,
    );

    return view('backend.product.addproduct',$data);
  }

      public function addproduct(Request $request)
     {
       // WARNING validate -> nama barang , karena harus sesuai dengan didatabase ,
       $validatedData = $request->validate([
         'nama_barang' => 'unique:master_barangs',
        ]);
        $addproduct = new Barang;
        $addproduct->foto = 'kosong';
        $addproduct->lokasifoto = 'kosong';
        $addproduct->kode_kategori = $request->codeCategory;
        $addproduct->kode_barang = 'PR-'.date('Ymdhis');
        $addproduct->nama_barang = $request->nama_barang;
        $addproduct->berat_barang = $request->weightProduct;
        $addproduct->hpp = $request->purchaseProduct;
        $addproduct->harga_jual = $request->sellingProduct;
        $addproduct->stok = $request->stockProduct;
        $addproduct->deskripsi = $request->description;
        $addproduct->save();

       return redirect('product');
     }

     public function detailproduct($code)
    {
      $data = array(
        'page' => 'Product',
      );

      return view('backend.product.detailproduct',$data);
    }

    public function formupdateproduct($code)
   {
     $showproduct = Barang::find($code);
     $category = DB::table('master_kategoris')->get();

     $select=[];
     $select['']='Choose Category';
   foreach ($category as $key) {
     $select[$key->kode_kategori]=$key->nama_kategori;
   }

     $data = array(
       'page' => 'Product',
       'product' => $showproduct,
       'code' => $code,
       'category' => $select,
     );

     return view('backend.product.updateproduct',$data);
   }

   public function updateproduct(Request $request)
  {
    $showproduct = Barang::find($request->codeProduct);
    // jika namabarang di showproduct sama dengan request nama barang maka tidak divalidate
    if ($request->nama_barang == $showproduct->nama_barang) {
      $updateproduct = Barang::find($request->codeProduct);
      $updateproduct->kode_kategori = $request->codeCategory;
      $updateproduct->berat_barang = $request->weightProduct;
      $updateproduct->hpp = $request->purchaseProduct;
      $updateproduct->harga_jual = $request->sellingProduct;
      $updateproduct->stok = $request->stockProduct;
      $updateproduct->deskripsi = $request->description;
      $updateproduct->save();
    }else {
      // WARNING validate -> nama barang , karena harus sesuai dengan didatabase ,
      $validatedData = $request->validate([
        'nama_barang' => 'unique:master_barangs',
       ]);
      $updateproduct = Barang::find($request->codeProduct);
      $updateproduct->kode_kategori = $request->codeCategory;
      $updateproduct->nama_barang = $request->nama_barang;
      $updateproduct->berat_barang = $request->weightProduct;
      $updateproduct->hpp = $request->purchaseProduct;
      $updateproduct->harga_jual = $request->sellingProduct;
      $updateproduct->stok = $request->stockProduct;
      $updateproduct->deskripsi = $request->description;
      $updateproduct->save();
    }
    return redirect('product');
  }

  public function deleteproduct(Request $request)
 {
   $deleteproduct = Barang::find($request->codeProduct)->delete();

   return redirect('product');
 }
}
