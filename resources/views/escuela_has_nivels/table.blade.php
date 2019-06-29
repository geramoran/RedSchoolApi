<div class="table-responsive">
    <table class="table" id="escuelaHasNivels-table">
        <thead>
            <tr>
                <th>Escuela Id</th>
        <th>Nivel Id</th>
        <th>Nivel Modoeducacion Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($escuelaHasNivels as $escuelaHasNivel)
            <tr>
                <td>{!! $escuelaHasNivel->Escuela_id !!}</td>
            <td>{!! $escuelaHasNivel->Nivel_id !!}</td>
            <td>{!! $escuelaHasNivel->Nivel_ModoEducacion_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['escuelaHasNivels.destroy', $escuelaHasNivel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('escuelaHasNivels.show', [$escuelaHasNivel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('escuelaHasNivels.edit', [$escuelaHasNivel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
