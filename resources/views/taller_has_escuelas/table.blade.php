<div class="table-responsive">
    <table class="table" id="tallerHasEscuelas-table">
        <thead>
            <tr>
                <th>Taller Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tallerHasEscuelas as $tallerHasEscuela)
            <tr>
                <td>{!! $tallerHasEscuela->Taller_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['tallerHasEscuelas.destroy', $tallerHasEscuela->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tallerHasEscuelas.show', [$tallerHasEscuela->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tallerHasEscuelas.edit', [$tallerHasEscuela->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
