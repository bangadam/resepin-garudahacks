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
                   {!! Form::model($dokter, ['route' => ['dokters.updateProfile', $dokter->id_user], 'method' =>
                   'patch'])
                    !!}

                        @include('dokters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
