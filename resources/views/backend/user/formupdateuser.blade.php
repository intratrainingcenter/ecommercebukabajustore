
{{Form::open(['route'=>'userUpdate','method'=>'post'])}}
<div class="row">
      <div class="imgshow col-sm-12 form-group">
          <img  src=@if ($user->avatar == null)"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkgjWUXXQEfziJEK2lotHcpB9hXpYSJJtLJfaHWOh78M2XEOka"@elseif($user->kode_jabatan === "member"){{$user->avatar_original}} @else"{{ asset('storage/imageuser'.'/'.$user->avatar) }}"@endif alt="" style="display: block;margin-left: auto;margin-right: auto;width: 40%;">
        </div>
    <div class="form-group col-md-6">
      <div class="col-sm-12">
        {{Form::label('Images')}}
      </div>
        <div class="col-sm-12">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcroopie" title="replace image">Choose a Image</button>
            @php
              $input = Form::file('images',['class'=>'inputImageuser']);
            @endphp
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('name')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Name')}}
          {{Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'User Name'])}}
            @if($errors->has('name')) <div class="form-control-feedback">{{ $errors->first('name') }}</div> @endif
          {{Form::hidden('avatar',$user->avatar)}}
          {{Form::hidden('userid',$user->kode_user)}}
          {{Form::hidden('id',$user->id)}}
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('email')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('E-mail')}}
          {{Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'E-mail'])}}
            @if($errors->has('email')) <div class="form-control-feedback">{{ $errors->first('email') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Gender')}}
          {{Form::select('gender', ['male' => 'Male', 'female' => 'Female'],$user->jenis_kelamin,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('addres')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Address')}}
          {{Form::text('addres',$user->alamat,['class'=>'form-control','placeholder'=>'Your Addres'])}}
            @if($errors->has('addres')) <div class="form-control-feedback">{{ $errors->first('addres') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Position')}}
          {{Form::select('position',$position,$user->kode_jabatan,['class'=>'form-control'])}}
        </div>
    </div>
    <div class="form-group col-md-6 @if($errors->has('phonenumber')) has-primary @endif">
        <div class="col-sm-12">
          {{Form::label('Phone Number')}}
          {{Form::number('phonenumber',$user->no_telp,['class'=>'form-control','placeholder'=>'Number Phone'])}}
            @if($errors->has('phonenumber')) <div class="form-control-feedback">{{ $errors->first('phonenumber') }}</div> @endif
        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="col-sm-12">
          {{Form::label('Status')}}
          {{Form::select('status', ['Active' => 'Active', 'nonActive' => 'NonActive'],$user->status,['class'=>'form-control'])}}
        </div>
    </div>
</div>
{{Form::button('Save',['type'=>'submit','class'=>'btn btn-success waves-effect waves-light pull-right'])}}
<a href="{{route('userIndex')}}" class="btn btn-warning waves-effect waves-light pull-left">Cancel</a>
  {!!Backendhelper::CroopieModal('modalcroopie',$input,'user')!!}
{{Form::close()}}
