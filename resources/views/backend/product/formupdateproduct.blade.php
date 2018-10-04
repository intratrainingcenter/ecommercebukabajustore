{{Form::open(['route'=>'updateProduct','method'=>'put'])}}
              {{Form::hidden('codeProduct',$code)}}
    <div class="row">
          <div class="form-group col-md-6">
              <div class="col-sm-12">
                {{Form::label('Name Product')}}
                  {{Form::text('nama_barang',$product->nama_barang,['class'=>'form-control','placeholder'=>'Enter Name Product','required'])}}
              </div>
          </div>
          <div class="form-group col-md-6">
              <div class="col-sm-12">
                {{Form::label('Category')}}
                  {{Form::select('codeCategory',$category,null,['class'=>'form-control','required'])}}
              </div>
          </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group col-sm-12">
              {{Form::label('Weight Product')}}
              <div class="input-group">
                {{Form::number('weightProduct',$product->berat_barang,['class'=>'form-control','placeholder'=>'Enter Weight Product','min'=>'0','required'])}}
                <span class="input-group-addon b-0">gram</span>
                </div>
            </div>
            <div class="form-group col-sm-12">
              {{Form::label('Purchase Price Product')}}
                {{Form::number('purchaseProduct',$product->hpp,['class'=>'form-control','placeholder'=>'Enter Purchase Price Product','min'=>'0','required'])}}
            </div>
            <div class="form-group col-sm-12">
              {{Form::label('Selling Price Product')}}
                {{Form::number('sellingProduct',$product->harga_jual,['class'=>'form-control','placeholder'=>'Enter Sellin Price Product','min'=>'0','required'])}}
            </div>
            <div class="form-group col-sm-12">
              {{Form::label('Stock Product')}}
                {{Form::number('stockProduct',$product->stok,['class'=>'form-control','placeholder'=>'Enter Stock Product','min'=>'0','required'])}}
            </div>
          </div>
        <div class="col-md-6">
            <div class="form-group col-sm-12">
              {{Form::label('Description')}}
                {{Form::textarea('description',$product->deskripsi,['class'=>'form-control','placeholder'=>'Enter Description','required','max'=>'255'])}}
            </div>
        </div>
    </div>
{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
{{Form::close()}}
