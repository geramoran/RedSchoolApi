<div class="table-responsive">
    <table class="table" id="puntosfuertes-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Src</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($puntosfuertes as $puntosfuertes)
            <tr>
                <td>{!! $puntosfuertes->nombre !!}</td>
            <td>{!! $puntosfuertes->src !!}</td>
                <td>
                    {!! Form::open(['route' => ['puntosfuertes.destroy', $puntosfuertes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('puntosfuertes.show', [$puntosfuertes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('puntosfuertes.edit', [$puntosfuertes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
