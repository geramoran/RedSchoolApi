<div class="table-responsive">
    <table class="table" id="cuotas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Precio</th>
        <th>Escuela Has Nivel Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cuotas as $cuota)
            <tr>
                <td>{!! $cuota->nombre !!}</td>
            <td>{!! $cuota->Precio !!}</td>
            <td>{!! $cuota->Escuela_has_Nivel_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['cuotas.destroy', $cuota->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('cuotas.show', [$cuota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('cuotas.edit', [$cuota->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
