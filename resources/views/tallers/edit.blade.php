@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Taller
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($taller, ['route' => ['tallers.update', $taller->id], 'method' => 'patch']) !!}

                        @include('tallers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection