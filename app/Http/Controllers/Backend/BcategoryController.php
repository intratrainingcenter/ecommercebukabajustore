<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
      'imageCategory' => 'required',
    ]);

      $createdirectory = Storage::makeDirectory('public/imagecategory');
      $image = str_replace('data:image/png;base64,', '', $request->imageCategory);
      $image = str_replace(' ','+',$image);
      $namefile = str_random(16).'.png';
      Storage::put('public/imagecategory'.'/'.$namefile, base64_decode($image));

      $createCategory = Kategori::create([
        'kode_kategori' => $request->codeCategory,
        'nama_kategori' => $request->nameCategory,
        'foto_kategori' => $namefile,
        'lokasifoto' => 'public/imagecategory/',
      ]);

      return redirect()->route('categoryIndex')->with('success','data was successfully added.');
    }

    public function deletecategory(Request $request)
    {
      $getcategory = Kategori::find($request->idCategory);
      Storage::delete('public/imagecategory'.'/'.$getcategory->foto_kategori);
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
        'nameCategory' => 'required',
      ]);
      if ($request->imageCategory == true) {
        $createdirectory = Storage::makeDirectory('public/imagecategory');
        $image = str_replace('data:image/png;base64,', '', $request->imageCategory);
        $image = str_replace(' ','+',$image);
        $namefile = str_random(16).'.png';
        Storage::put('public/imagecategory'.'/'.$namefile, base64_decode($image));
        $getcategory = Kategori::find($request->id);
        Storage::delete('public/imagecategory'.'/'.$getcategory->foto_kategori);

        $createCategory = Kategori::where('id',$request->id)->update([
          'foto_kategori' => $namefile,
        ]);
      }

      $createCategory = Kategori::where('id',$request->id)->update([
        'nama_kategori' => $request->nameCategory,
      ]);

      return redirect()->route('categoryIndex')->with('success','data was successfully updated.');
    }

}
