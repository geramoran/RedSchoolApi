<div class="table-responsive">
    <table class="table" id="tipocontactos-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tipocontactos as $tipocontacto)
            <tr>
                <td>{!! $tipocontacto->nombre !!}</td>
                <td>
                    {!! Form::open(['route' => ['tipocontactos.destroy', $tipocontacto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tipocontactos.show', [$tipocontacto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tipocontactos.edit', [$tipocontacto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
