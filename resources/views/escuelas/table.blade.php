<div class="table-responsive">
    <table class="table" id="escuelas-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
        <th>Premium1</th>
        <th>Premium2</th>
        <th>Premium3</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($escuelas as $escuela)
            <tr>
                <td>{!! $escuela->nombre !!}</td>
            <td>{!! $escuela->descripcion !!}</td>
            <td>{!! $escuela->premium1 !!}</td>
            <td>{!! $escuela->premium2 !!}</td>
            <td>{!! $escuela->premium3 !!}</td>
                <td>
                    {!! Form::open(['route' => ['escuelas.destroy', $escuela->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('escuelas.show', [$escuela->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('escuelas.edit', [$escuela->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
