{{-- MODAL VALIDATION PROCESS --}}
<div id="modalreturnProcess" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation process validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationReturn']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Process Return Transaction?</p>
                <input type="hidden" name="codeProcessReturn" id="codeProcessreturn">
                <input type="hidden" name="opsi" value="process">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- END MODAL VALIDATION PROCESS --}}

{{-- MODAL VALIDATION RECEIVED --}}
<div id="modalreturnReceived" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation received validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationReturn']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Received Return Transaction?</p>
                <input type="hidden" name="codeReceivedReturn" id="codeReceivedreturn">
                <input type="hidden" name="opsi" value="received">
                {{ Form::number('cashback',null,['class'=>'form-control','placeholder'=>'Please Enter no Cashback','step'=>'any','required']) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- END MODAL VALIDATION RECEIVED --}}

{{-- MODAL VALIDATION REJECT --}}
<div id="modalreturnReject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation Reject validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationReturn']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Reject Return?</p>
                <input type="hidden" name="codeRetunReject" id="coderejectreturn">
                <input type="hidden" name="opsi" value="reject">
                 {{Form::textarea('explaNation',null,['class'=>'summernote', 'placeholder'=> 'Enter Reason here','required'])}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- END MODAL VALIDATION CANCEL --}}
