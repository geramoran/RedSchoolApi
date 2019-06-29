@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Puntosfuertes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($puntosfuertes, ['route' => ['puntosfuertes.update', $puntosfuertes->id], 'method' => 'patch']) !!}

                        @include('puntosfuertes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection