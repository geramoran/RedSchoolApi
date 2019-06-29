<div class="table-responsive">
    <table class="table" id="instalaciones-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Src</th>
        <th>Escuela Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($instalaciones as $instalaciones)
            <tr>
                <td>{!! $instalaciones->nombre !!}</td>
            <td>{!! $instalaciones->src !!}</td>
            <td>{!! $instalaciones->Escuela_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['instalaciones.destroy', $instalaciones->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('instalaciones.show', [$instalaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('instalaciones.edit', [$instalaciones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
