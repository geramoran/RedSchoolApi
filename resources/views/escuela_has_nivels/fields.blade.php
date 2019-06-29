<!-- Escuela Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Escuela_id', 'Escuela Id:') !!}
    {!! Form::number('Escuela_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nivel_id', 'Nivel Id:') !!}
    {!! Form::number('Nivel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivel Modoeducacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nivel_ModoEducacion_id', 'Nivel Modoeducacion Id:') !!}
    {!! Form::number('Nivel_ModoEducacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('escuelaHasNivels.index') !!}" class="btn btn-default">Cancel</a>
</div>
