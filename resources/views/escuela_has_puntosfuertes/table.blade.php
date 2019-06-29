<div class="table-responsive">
    <table class="table" id="escuelaHasPuntosfuertes-table">
        <thead>
            <tr>
                <th>Puntosfuertes Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($escuelaHasPuntosfuertes as $escuelaHasPuntosfuertes)
            <tr>
                <td>{!! $escuelaHasPuntosfuertes->PuntosFuertes_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['escuelaHasPuntosfuertes.destroy', $escuelaHasPuntosfuertes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('escuelaHasPuntosfuertes.show', [$escuelaHasPuntosfuertes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('escuelaHasPuntosfuertes.edit', [$escuelaHasPuntosfuertes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
