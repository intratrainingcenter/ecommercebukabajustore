
{{Form::open(['route'=>'userCreate','method'=>'post'])}}
<div class="row">
      <div class="imgshow col-sm-12 form-group"></div>
    <div class="form-group col-md-6">
      <div class="col-sm-12">
        {{Form::label('Images')}}
      </div>
        <div class="col-sm-12">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcroopie">Choose a Image</button>
            @php
              $input = Form::file('images',['class'=>'inputImageuser','required']);
            @endphp
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Name')}}
          {{Form::text('name',null,['class'=>'form-control','placeholder'=>'User Name','required'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Password')}}
          {{Form::Password('password',['class'=>'form-control','placeholder'=>'Password','required'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('E-mail')}}
          {{Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail','required'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Gender')}}
          {{Form::select('gender', ['male' => 'Male', 'fimale' => 'Fimale'],null,['class'=>'form-control','required'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Address')}}
          {{Form::text('addres',null,['class'=>'form-control','placeholder'=>'Your Addres','required'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Position')}}
          {{Form::select('position',$position,null,['class'=>'form-control','required'])}}
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('No-Tlp')}}
          {{Form::number('phonenumber',null,['class'=>'form-control','placeholder'=>'Number Phone','required'])}}
        </div>
    </div>
</div>
{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
<a href="{{route('userIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
  {!!Backendhelper::CroopieModal('modalcroopie',$input,'user')!!}
{{Form::close()}}

