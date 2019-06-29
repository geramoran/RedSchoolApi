@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Taller Has Escuela
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tallerHasEscuela, ['route' => ['tallerHasEscuelas.update', $tallerHasEscuela->id], 'method' => 'patch']) !!}

                        @include('taller_has_escuelas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection