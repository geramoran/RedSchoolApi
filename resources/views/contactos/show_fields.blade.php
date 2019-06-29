<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $contacto->id !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $contacto->valor !!}</p>
</div>

<!-- Tipocontacto Id Field -->
<div class="form-group">
    {!! Form::label('tipoContacto_id', 'Tipocontacto Id:') !!}
    <p>{!! $contacto->tipoContacto_id !!}</p>
</div>

<!-- Escuela Has Nivel Id Field -->
<div class="form-group">
    {!! Form::label('Escuela_has_Nivel_id', 'Escuela Has Nivel Id:') !!}
    <p>{!! $contacto->Escuela_has_Nivel_id !!}</p>
</div>

