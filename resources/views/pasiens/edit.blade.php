@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pasien
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pasien, ['route' => ['pasiens.update', $pasien->id], 'method' => 'patch']) !!}

                        @include('pasiens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection