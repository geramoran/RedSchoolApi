<!-- Valor Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('valor', 'Valor:') !!}
    {!! Form::textarea('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipocontacto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipoContacto_id', 'Tipocontacto Id:') !!}
    {!! Form::number('tipoContacto_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Escuela Has Nivel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Escuela_has_Nivel_id', 'Escuela Has Nivel Id:') !!}
    {!! Form::number('Escuela_has_Nivel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('contactos.index') !!}" class="btn btn-default">Cancel</a>
</div>
