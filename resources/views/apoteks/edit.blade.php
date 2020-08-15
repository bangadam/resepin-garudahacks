@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Apotek
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($apotek, ['route' => ['apoteks.update', $apotek->id], 'method' => 'patch']) !!}

                        @include('apoteks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection