<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Premium1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('premium1', 'Premium1:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('premium1', 0) !!}
        {!! Form::checkbox('premium1', '1', null) !!} 1
    </label>
</div>

<!-- Premium2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('premium2', 'Premium2:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('premium2', 0) !!}
        {!! Form::checkbox('premium2', '1', null) !!} 1
    </label>
</div>

<!-- Premium3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('premium3', 'Premium3:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('premium3', 0) !!}
        {!! Form::checkbox('premium3', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('escuelas.index') !!}" class="btn btn-default">Cancel</a>
</div>
