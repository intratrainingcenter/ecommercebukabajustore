<?php
namespace App\Library;

class Backendhelper
{
	public static function read_update_delete_byid($id,$routeedit,$routedetail)
	{
		$data = '<a><button type="button" class="btn btn-outline-primary waves-effect waves-light pull-right deleteData" style="margin-right: 10px;" attr-id='.$id.' title="Hapus"><i class="fa fa-trash-o"></i>
			</button></a>
			<a href="'.$routeedit.'"><button type="button" class="btn btn-outline-warning waves-effect waves-light pull-right" style="margin-right: 10px;" title="Edit"><i class="fa fa-pencil"></i>
			</button></a>
			<a href="'.$routedetail.'"><button type="button" class="btn btn-outline-info waves-effect waves-light pull-right" style="margin-right: 10px;" title="Detail"><i class="fa fa-search"></i>
			</button></a>';
		return $data;
	}

	public static function story_read_update_delete_byid($id,$page_update,$page_detail)
	{
		$data = '<a><button type="button" class="btn btn-outline-primary waves-effect waves-light pull-right deleteData" style="margin-right: 10px;" attr-id='.$id.' title="Hapus"><i class="fa fa-trash-o"></i>
			</button></a>
			<a href="'.$page_update.'"><button type="button" class="btn btn-outline-warning waves-effect waves-light pull-right" style="margin-right: 10px;" attr-id='.$id.' title="Edit"><i class="fa fa-pencil"></i>
			</button></a>
			<a href="'.$page_detail.'"><button type="button" class="btn btn-outline-info waves-effect waves-light pull-right" style="margin-right: 10px;" title="Detail"><i class="fa fa-search"></i>
			</button></a>';
		return $data;
	}
	public static function CroopieModal($Modalid,$Fileinput,$name)
	{
		$data ='<div id='.$Modalid.' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title mt-0" id="myModalLabel">Croopie</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		            </div>
		            <div class="modal-body">
		                <div class="col-sm-12">'.$Fileinput.'</div>
		                <div id="cropimage'.$name.'" class="col-md-12"></div>
		                <div class="input-field col-md-3"><input type="hidden" name="image'.$name.'" value="" data-error=".err6"></div>
		                <div class="col-md-12 accepted"></div>
		            </div>
		            <div class="modal-footer">
		            </div>
		        </div><!-- /.modal-content -->
		    </div>
		</div>';
		return $data;
	}
}
