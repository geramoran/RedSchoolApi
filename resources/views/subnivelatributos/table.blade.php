<div class="table-responsive">
    <table class="table" id="subnivelatributos-table">
        <thead>
            <tr>
                <th>Clave</th>
        <th>Valor</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subnivelatributos as $subnivelatributos)
            <tr>
                <td>{!! $subnivelatributos->clave !!}</td>
            <td>{!! $subnivelatributos->valor !!}</td>
                <td>
                    {!! Form::open(['route' => ['subnivelatributos.destroy', $subnivelatributos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('subnivelatributos.show', [$subnivelatributos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('subnivelatributos.edit', [$subnivelatributos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
