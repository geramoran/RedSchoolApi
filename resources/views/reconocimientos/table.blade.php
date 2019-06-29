<div class="table-responsive">
    <table class="table" id="reconocimientos-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Escuela Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reconocimientos as $reconocimientos)
            <tr>
                <td>{!! $reconocimientos->Nombre !!}</td>
            <td>{!! $reconocimientos->Escuela_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['reconocimientos.destroy', $reconocimientos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('reconocimientos.show', [$reconocimientos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('reconocimientos.edit', [$reconocimientos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
