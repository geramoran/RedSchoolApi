<div class="table-responsive">
    <table class="table" id="contactos-table">
        <thead>
            <tr>
                <th>Valor</th>
        <th>Tipocontacto Id</th>
        <th>Escuela Has Nivel Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contactos as $contacto)
            <tr>
                <td>{!! $contacto->valor !!}</td>
            <td>{!! $contacto->tipoContacto_id !!}</td>
            <td>{!! $contacto->Escuela_has_Nivel_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['contactos.destroy', $contacto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('contactos.show', [$contacto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('contactos.edit', [$contacto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
