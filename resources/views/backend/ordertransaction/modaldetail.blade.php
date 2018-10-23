{{-- MODAL VALIDATION PROCESS --}}
<div id="modalProcess" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation process validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationprocess']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Process Transaction?</p>
                <input type="hidden" name="codeProcess" id="codeProcess">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light" id="functionProcess">Process</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- END MODAL VALIDATION PROCESS --}}