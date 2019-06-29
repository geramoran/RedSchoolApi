<!-- Src Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('src', 'Src:') !!}
    {!! Form::textarea('src', null, ['class' => 'form-control']) !!}
</div>

<!-- Typemedia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('typeMedia_id', 'Typemedia Id:') !!}
    {!! Form::number('typeMedia_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Escuela Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Escuela_id', 'Escuela Id:') !!}
    {!! Form::number('Escuela_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('media.index') !!}" class="btn btn-default">Cancel</a>
</div>
