
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    <input type="text" name="name" class="form-control" value="{{$dokter->user->name}}">
</div>


<div class="form-group col-sm-6">
    {!! Form::label('Email', 'Email:') !!}
    <input type="email" name="email" class="form-control" value="{{$dokter->user->email}}">
</div>


<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    <input type="number" name="telepon" class="form-control" value="{{$dokter->user->telepon}}">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nik', 'NIK:') !!}
    <input type="number" name="nik" class="form-control" value="{{$dokter->user->nik}}">
</div>

<div class="form-group col-sm-12">
    {!! Form::label('Address', 'Address:') !!}
    <textarea name="alamat" class="form-control" rows="10">
        {{$dokter->user->alamat}}
    </textarea>
</div>

<!-- Sip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sip', 'Sip:') !!}
    {!! Form::text('sip', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Str Field -->
<div class="form-group col-sm-6">
    {!! Form::label('str', 'Str:') !!}
    {!! Form::text('str', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
</div>
