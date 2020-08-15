@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            My Profile
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($pasien, ['route' => ['pasiens.updateProfile', $pasien->id_user], 'method' =>
                'patch'])
                 !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('nama', 'Name:') !!}
                        <input type="text" name="name" class="form-control" value="{{$pasien->user->name}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        <input type="email" name="email" class="form-control" value="{{$pasien->user->email}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nik', 'NIK:') !!}
                        <input type="number" name="nik" class="form-control" value="{{$pasien->user->nik}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('telepon', 'Phone:') !!}
                        <input type="number" name="telepon" class="form-control" value="{{$pasien->user->telepon}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('password', 'Password:') !!}
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('dob', 'Dob:') !!}
                        <input type="date" name="dob" class="form-control" value="{{$pasien->dob->format('Y-m-d')}}">
                    </div>

                    <div class="form-group col-sm-12">
                        {!! Form::label('alamat', 'Alamat:') !!}
                        <textarea name="alamat_user" rows="5" class="form-control"> {{$pasien->user->alamat}}
                        </textarea>
                    </div>

                    <hr>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save changes', ['class' => 'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
