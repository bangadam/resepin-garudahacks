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
                {!! Form::model($apoteker, ['route' => ['apotekers.updateProfile', $apoteker->id_user], 'method' =>
                'patch'])
                 !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('nama', 'Name:') !!}
                        <input type="text" name="name" class="form-control" value="{{$apoteker->user->name}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        <input type="email" name="email" class="form-control" value="{{$apoteker->user->email}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nik', 'NIK:') !!}
                        <input type="number" name="nik" class="form-control" value="{{$apoteker->user->nik}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('telepon', 'Phone:') !!}
                        <input type="number" name="telepon" class="form-control" value="{{$apoteker->user->telepon}}">
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('alamat', 'Alamat profile:') !!}
                        <textarea name="alamat_user" rows="5" class="form-control"> {{$apoteker->user->alamat}}
                        </textarea>
                    </div>

                    <hr>
                <!-- Nama Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nama', 'Nama Apotek:') !!}
                        <input type="text" name="nama" class="form-control" value="{{$apoteker->apotek->nama}}">
                    </div>

                    <!-- Nomor Izin Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('nomor_izin', 'Nomor Izin:') !!}
                        <input type="text" name="nomor_izin" class="form-control"
                               value="{{$apoteker->apotek->nomor_izin}}">
                    </div>

                    <!-- Alamat Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::label('alamat', 'Alamat:') !!}
                        <textarea name="alamat" rows="5" class="form-control"> {{$apoteker->apotek->alamat}} </textarea>
                    </div>

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
