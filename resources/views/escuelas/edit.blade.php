@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Escuela
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($escuela, ['route' => ['escuelas.update', $escuela->id], 'method' => 'patch']) !!}

                        @include('escuelas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection