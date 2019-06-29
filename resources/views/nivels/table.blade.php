<div class="table-responsive">
    <table class="table" id="nivels-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Subnivel Id</th>
        <th>Nivelatributos Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($nivels as $nivel)
            <tr>
                <td>{!! $nivel->nombre !!}</td>
            <td>{!! $nivel->subnivel_id !!}</td>
            <td>{!! $nivel->nivelAtributos_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['nivels.destroy', $nivel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('nivels.show', [$nivel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('nivels.edit', [$nivel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
