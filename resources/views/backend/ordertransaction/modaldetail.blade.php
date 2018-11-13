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
                <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- END MODAL VALIDATION PROCESS --}}

{{-- MODAL VALIDATION DELIVERY --}}
<div id="modalDelivery" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation delivery validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationdelivery']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Delivery Transaction?</p>
                <input type="hidden" name="codeDelivery" id="codeDelivery">
                {{ Form::text('noReceipt',null,['class'=>'form-control','placeholder'=>'Please Enter no receipt','required']) }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Yes</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- END MODAL VALIDATION DELIVERY --}}

{{-- MODAL VALIDATION RECEIVED --}}
<div id="modalReceived" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation received validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationreceived']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Received Transaction?</p>
                <input type="hidden" name="codeReceived" id="codeReceived">
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

{{-- MODAL VALIDATION CANCEL --}}
<div id="modalCancel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Confirmation cancel validation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            {!! Form::open(['method' => 'PUT', 'route' => 'validationcancel']) !!}
            <div class="modal-body">
                <p>Are you sure will validate Cancel Transaction?</p>
                <input type="hidden" name="codeCancel" id="codeCancel">
                 {{Form::textarea('explaNation',null,['class'=>'summernote'])}}
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