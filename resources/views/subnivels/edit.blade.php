@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subnivel
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subnivel, ['route' => ['subnivels.update', $subnivel->id], 'method' => 'patch']) !!}

                        @include('subnivels.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection