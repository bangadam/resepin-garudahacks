@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Obat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($obat, ['route' => ['obats.update', $obat->id], 'method' => 'patch']) !!}

                        @include('obats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection