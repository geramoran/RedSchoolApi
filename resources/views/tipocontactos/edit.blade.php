@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipocontacto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tipocontacto, ['route' => ['tipocontactos.update', $tipocontacto->id], 'method' => 'patch']) !!}

                        @include('tipocontactos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection