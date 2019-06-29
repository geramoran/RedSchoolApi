@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subnivelatributos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subnivelatributos, ['route' => ['subnivelatributos.update', $subnivelatributos->id], 'method' => 'patch']) !!}

                        @include('subnivelatributos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection