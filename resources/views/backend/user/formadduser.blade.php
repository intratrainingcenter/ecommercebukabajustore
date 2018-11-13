
{{Form::open(['route'=>'userCreate','method'=>'post'])}}
<div class="row">
      <div class="imgshow col-sm-12 form-group"></div>
    <div class="form-group col-md-6 @if($errors->has('imageuser')) has-primary @endif">
      <div class="col-sm-12">
        {{Form::label('Images')}}
      </div>
        <div class="col-sm-12">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcroopie">Choose a Image</button>
          @if($errors->has('imageuser')) <div class="form-control-feedback">Choose and Crop image again </div> @endif
            @php
              $input = Form::file('images',['class'=>'inputImageuser']);
            @endphp
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('name')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Name')}}
          {{Form::text('name',null,['class'=>'form-control','placeholder'=>'User Name'])}}
            @if($errors->has('name')) <div class="form-control-feedback">{{ $errors->first('name') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('password')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Password')}}
          {{Form::Password('password',['class'=>'form-control','placeholder'=>'Password'])}}
            @if($errors->has('password')) <div class="form-control-feedback">{{ $errors->first('password') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('email')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('E-mail')}}
          {{Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail'])}}
            @if($errors->has('email')) <div class="form-control-feedback">{{ $errors->first('email') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('gender')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Gender')}}
          {{Form::select('gender', [''=> 'Choose your Gender', 'male' => 'Male', 'female' => 'Female'],null,['class'=>'form-control'])}}
          @if($errors->has('addres')) <div class="form-control-feedback">{{ $errors->first('gender') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('addres')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Address')}}
          {{Form::text('addres',null,['class'=>'form-control','placeholder'=>'Your Addres'])}}
            @if($errors->has('addres')) <div class="form-control-feedback">{{ $errors->first('addres') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6 ">
        <div class="col-sm-12">
          {{Form::label('Position')}}
          {{Form::select('position',$position,null,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('phonenumber')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('No-Tlp')}}
          {{Form::number('phonenumber',null,['class'=>'form-control','placeholder'=>'Number Phone'])}}
            @if($errors->has('phonenumber')) <div class="form-control-feedback">{{ $errors->first('phonenumber') }}</div> @endif
        </div>
    </div>
</div>
{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
<a href="{{route('userIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
  {!!Backendhelper::CroopieModal('modalcroopie',$input,'user')!!}
{{Form::close()}}
