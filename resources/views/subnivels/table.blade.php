<div class="table-responsive">
    <table class="table" id="subnivels-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Subnivelatributos Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subnivels as $subnivel)
            <tr>
                <td>{!! $subnivel->nombre !!}</td>
            <td>{!! $subnivel->subNivelAtributos_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['subnivels.destroy', $subnivel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('subnivels.show', [$subnivel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('subnivels.edit', [$subnivel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
