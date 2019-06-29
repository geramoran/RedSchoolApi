@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Reconocimientos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($reconocimientos, ['route' => ['reconocimientos.update', $reconocimientos->id], 'method' => 'patch']) !!}

                        @include('reconocimientos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection