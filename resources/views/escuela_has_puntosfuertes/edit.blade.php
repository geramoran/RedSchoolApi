@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Escuela Has Puntosfuertes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($escuelaHasPuntosfuertes, ['route' => ['escuelaHasPuntosfuertes.update', $escuelaHasPuntosfuertes->id], 'method' => 'patch']) !!}

                        @include('escuela_has_puntosfuertes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection