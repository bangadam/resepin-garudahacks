@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Resep
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($resep, ['route' => ['reseps.update', $resep->id], 'method' => 'patch']) !!}

                        @include('reseps.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection