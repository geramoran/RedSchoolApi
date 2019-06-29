<div class="table-responsive">
    <table class="table" id="nivelatributos-table">
        <thead>
            <tr>
                <th>Clave</th>
        <th>Valor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($nivelatributos as $nivelatributos)
            <tr>
                <td>{!! $nivelatributos->clave !!}</td>
            <td>{!! $nivelatributos->valor !!}</td>
                <td>
                    {!! Form::open(['route' => ['nivelatributos.destroy', $nivelatributos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('nivelatributos.show', [$nivelatributos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('nivelatributos.edit', [$nivelatributos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
