<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kategori;

class BcategoryController extends Controller
{
    public function index()
    {
      $data = array(
        'page' => 'Category',
        'dataCategory' => Kategori::all(),
      );

      return view('backend.category.index',$data);
    }

    public function loaddatacategory()
    {
      $data = array(
        'dataCategory' => Kategori::all(),
      );

      return view('backend.category.tabledatacategory',$data);
    }

    public function addcategory()
    {
      $data = array(
        'page' => 'Category',
      );
      return view('backend.category.addcategory',$data);
    }

    public function createcategory(Request $request)
    {
      $validateCategory = $request->validate([
        'codeCategory' => 'required|unique:master_kategoris,kode_kategori',
        'nameCategory' => 'required',
      ]);

      $createCategory = Kategori::create([
        'kode_kategori' => $request->codeCategory,
        'nama_kategori' => $request->nameCategory,
      ]);

      return redirect()->route('categoryIndex');
    }

    public function deletecategory(Request $request)
    {
      $deleterequest = Kategori::destroy($request->idCategory);
      return 'success';
    }

    public function detailcategory($id)
    {
      $data =  array(
        'page' => 'Category',
        'detailCategory' => Kategori::find($id),
      );

      return view('backend.category.detailcategory',$data);
    }

    public function editcategory($id)
    {
      $data =  array(
        'page' => 'Category',
        'dataCategory' => Kategori::find($id),
      );

      return view('backend.category.editcategory',$data);
    }

    public function updatecategory(Request $request)
    {

      $validateCategory = $request->validate([
        'codeCategory' => 'required|unique:master_kategoris,kode_kategori,'.$request->id,
        'nameCategory' => 'required',
      ]);


      $createCategory = Kategori::where('id',$request->id)->update([
        'kode_kategori' => $request->codeCategory,
        'nama_kategori' => $request->nameCategory,
      ]);

      return redirect()->route('categoryIndex'); 
    }

}
