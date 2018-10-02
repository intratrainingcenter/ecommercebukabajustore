    {{Form::open(['route'=>'promoCreate','method'=>'post','enctype'=>'multipart/form-data'])}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Image promo</h4>
                    <div class="m-b-30">
                        <div class="fallback">
                            <input name="image" type="file" class="inputImagepromo">
                        </div>
                    </div>
                    <div id="cropimagepromo" class="col-md-12"></div>
                    <div class="input-field col-md-3"><input type="hidden" name="imagePromo" value="" data-error=".err6"></div>
                    <div class="col-md-12 accepted"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="form-group col-md-6 @if($errors->has('codePromo')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Code Promo')}}
                {{Form::text('codePromo',null,['class'=>'form-control','placeholder'=>'Enter Code Promo'])}}
                @if($errors->has('codePromo')) <div class="form-control-feedback">{{ $errors->first('codePromo') }}</div> @endif
            </div>
        </div>
        <div class="form-group col-md-6 @if($errors->has('namePromo')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Name Promo')}}
                {{Form::text('namePromo',null,['class'=>'form-control','placeholder'=>'Enter Code Promo'])}}
                @if($errors->has('namePromo')) <div class="form-control-feedback">{{ $errors->first('namePromo') }}</div> @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 @if($errors->has('minimumPurchase')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Minimum purchase')}}
                {{Form::number('minimumPurchase',null,['class'=>'form-control','placeholder'=>'Enter Minimum purchase'])}}
                @if($errors->has('minimumPurchase')) <div class="form-control-feedback">{{ $errors->first('minimumPurchase') }}</div> @endif
            </div>
        </div>
        <div class="form-group col-md-6 @if($errors->has('disCount')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Discount')}}
                {{Form::number('disCount',null,['class'=>'form-control','placeholder'=>'Enter Discount Promo'])}}
                @if($errors->has('disCount')) <div class="form-control-feedback">{{ $errors->first('disCount') }}</div> @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 @if($errors->has('periodStart')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Period Start')}}
                {{Form::date('periodStart',null,['class'=>'form-control'])}}
                @if($errors->has('periodStart')) <div class="form-control-feedback">{{ $errors->first('periodStart') }}</div> @endif
            </div>
        </div>
        <div class="form-group col-md-6 @if($errors->has('periodEnd')) has-primary @endif">
            <div class="col-sm-12">
                {{Form::label('Period End')}}
                {{Form::date('periodEnd',null,['class'=>'form-control'])}}
                @if($errors->has('periodEnd')) <div class="form-control-feedback">{{ $errors->first('periodEnd') }}</div> @endif
            </div>
        </div>  
    </div>
    {{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
    {{Form::close()}}