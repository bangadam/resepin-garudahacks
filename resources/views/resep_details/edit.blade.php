@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Resep Detail
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($resepDetail, ['route' => ['resepDetails.update', $resepDetail->id], 'method' => 'patch']) !!}

                        @include('resep_details.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection