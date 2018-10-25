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

	public static function read_order_transaction($routedetail)
	{
		$data = '<a href="'.$routedetail.'"><button type="button" class="btn btn-outline-info waves-effect waves-light pull-right" style="margin-right: 10px;" title="Validation"><i class="fa fa-check"></i>
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
		                <div class="col-sm-12">'.$Fileinput.'</div><br>
										<div id="cropimage'.$name.'" class="col-md-12"></div>
		                <div class="col-md-12 imgshow"></div>
		                <div class="input-field col-md-3"><input type="hidden" name="image'.$name.'" value="" data-error=".err6"></div>
		                <div class="col-md-12 accepted"></div>
		            </div>
		            <div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Save</button>
		            </div>
		        </div><!-- /.modal-content -->
		    </div>
		</div>';
		return $data;
	}

	public static function modal_delete_user()
	{
		$data ='<div id="modalDelete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation Delete</h5>
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		            </div>
		            <div class="modal-body">
		                <p>Are you sure will delete this data User</span>?</p>
		                <input type="hidden" name="" value="" id="iduser">
		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary waves-effect waves-light pull-left" data-dismiss="modal">Cancel</button>
		                <button type="button" class="btn btn-primary waves-effect waves-light" id="deleteUser">Delete</button>
		            </div>
		        </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->';

		return $data;
	}
}
