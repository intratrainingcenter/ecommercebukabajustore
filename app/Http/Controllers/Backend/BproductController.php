<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Barang;

class BproductController extends Controller
{
  public function index()
  {
    $product = Barang::with('category')->get();
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
    $validatedData = $request->validate([
      'imageProduct' => 'required',
      'nama_barang' => 'unique:master_barangs|max:255',
      'weightProduct' => 'max:11',
      'purchaseProduct' => 'max:11',
      'sellingProduct' => 'max:11',
      'stockProduct' => 'max:11',
    ]);
    $createdirectory = Storage::makeDirectory('public/imageproduct');
    $image = str_replace('data:image/png;base64,', '', $request->imageProduct);
    $image = str_replace(' ','+',$image);
    $namefile = str_random(16).'.png';
    Storage::put('public/imageproduct'.'/'.$namefile, base64_decode($image));

    $addproduct = new Barang;
    $addproduct->foto = $namefile;
    $addproduct->lokasifoto = 'public/imageproduct/';
    $addproduct->kode_kategori = $request->codeCategory;
    $addproduct->kode_barang = 'PR-'.date('Ymdhis');
    $addproduct->nama_barang = $request->nama_barang;
    $addproduct->berat_barang = $request->weightProduct;
    $addproduct->hpp = $request->purchaseProduct;
    $addproduct->harga_jual = $request->sellingProduct;
    $addproduct->stok = $request->stockProduct;
    $addproduct->deskripsi = $request->description;
    $addproduct->save();

    return redirect('product')->with('success','data was successfully added.');
  }

  public function detailproduct($id)
  {
    $showproduct = Barang::find($id);
    $data = array(
      'page' => 'Product',
      'product' => $showproduct,
    );

    return view('backend.product.detailproduct',$data);
  }

  public function formupdateproduct($id)
  {
    $showproduct = Barang::find($id);
    $category = DB::table('master_kategoris')->get();
    $select=[];
    $select['']='Choose Category';
    foreach ($category as $key) {
      $select[$key->kode_kategori]=$key->nama_kategori;
    }

    $data = array(
      'page' => 'Product',
      'product' => $showproduct,
      'id' => $id,
      'category' => $select,
    );

    return view('backend.product.updateproduct',$data);
  }

  public function updateproduct(Request $request)
  {
    $updateproduct = Barang::find($request->idProduct);
    if ($request->imageProduct == true) {
      $createdirectory = Storage::makeDirectory('public/imageproduct');
      $image = str_replace('data:image/png;base64,', '', $request->imageProduct);
      $image = str_replace(' ','+',$image);
      $namefile = str_random(16).'.png';
      Storage::put('public/imageproduct'.'/'.$namefile, base64_decode($image));
      $getdataproduct = Barang::find($request->idProduct);
      Storage::delete('public/imageproduct'.'/'.$getdataproduct->foto);
      $updateproduct->foto = $namefile;
    }

    if ($request->nama_barang == $updateproduct->nama_barang) {

      $validatedData = $request->validate([
        'weightProduct' => 'max:11',
        'purchaseProduct' => 'max:11',
        'sellingProduct' => 'max:11',
        'stockProduct' => 'max:11',
      ]);

    }else {

      $validatedData = $request->validate([
        'nama_barang' => 'unique:master_barangs|max:255',
        'weightProduct' => 'max:11',
        'purchaseProduct' => 'max:11',
        'sellingProduct' => 'max:11',
        'stockProduct' => 'max:11',
      ]);

      $updateproduct->nama_barang = $request->nama_barang;
    }
    $updateproduct->kode_kategori = $request->codeCategory;
    $updateproduct->berat_barang = $request->weightProduct;
    $updateproduct->hpp = $request->purchaseProduct;
    $updateproduct->harga_jual = $request->sellingProduct;
    $updateproduct->stok = $request->stockProduct;
    $updateproduct->deskripsi = $request->description;
    $updateproduct->save();

    return redirect('product')->with('success','data was successfully updated.');
  }

  public function deleteproduct(Request $request)
  {
    $getdataproduct = Barang::find($request->idProduct);
    Storage::delete('public/imageproduct'.'/'.$getdataproduct->foto);
    $deleteproduct = Barang::find($request->idProduct)->delete();

    return 'success';
  }

  public function loaddataproduct()
  {
    $product = Barang::with(['category' => function(){
    }])->get();
    $data = array(
      'page' => 'Product',
      'product' => $product,
    );

    return view('backend.product.tabledataproduct',$data);
  }
}
