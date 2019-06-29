<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Subnivel Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subnivel_id', 'Subnivel Id:') !!}
    {!! Form::number('subnivel_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nivelatributos Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nivelAtributos_id', 'Nivelatributos Id:') !!}
    {!! Form::number('nivelAtributos_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nivels.index') !!}" class="btn btn-default">Cancel</a>
</div>
