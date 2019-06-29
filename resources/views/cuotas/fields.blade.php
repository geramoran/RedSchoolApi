<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Precio', 'Precio:') !!}
    {!! Form::number('Precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Escuela Has Nivel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Escuela_has_Nivel_id', 'Escuela Has Nivel Id:') !!}
    {!! Form::number('Escuela_has_Nivel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cuotas.index') !!}" class="btn btn-default">Cancel</a>
</div>
