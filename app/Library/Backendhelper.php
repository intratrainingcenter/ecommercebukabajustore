<?php
namespace App\Library;

class Backendhelper
{
	public static function promo_read_update_delete_byid($id,$basemenu)
	{
		$data = '<a><button type="button" class="btn btn-outline-primary waves-effect waves-light pull-right deleteData" style="margin-right: 10px;" attr-id='.$id.' title="Hapus"><i class="fa fa-trash-o"></i>
			</button></a>
			<a><button type="button" class="btn btn-outline-warning waves-effect waves-light pull-right" style="margin-right: 10px;" attr-id='.$id.' title="Edit"><i class="fa fa-pencil"></i>
			</button></a>
			<a href="promo/detailpromo/'.$id.'"><button type="button" class="btn btn-outline-info waves-effect waves-light pull-right" style="margin-right: 10px;" title="Detail"><i class="fa fa-search"></i>
			</button></a>';
		return $data;
	}
}