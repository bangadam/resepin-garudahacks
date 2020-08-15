@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dokter
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dokter, ['route' => ['dokters.update', $dokter->id], 'method' => 'patch']) !!}

                        @include('dokters.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection