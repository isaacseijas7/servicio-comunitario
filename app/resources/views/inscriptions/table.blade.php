<table class="table table-responsive" id="inscriptions-table">
    <thead>
        <tr>
            <th>Status</th>
        <th>Student Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($inscriptions as $inscription)
        <tr>
            <td>{!! $inscription->status !!}</td>
            <td>{!! $inscription->student_id !!}</td>
            <td>
                {!! Form::open(['route' => ['inscriptions.destroy', $inscription->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('inscriptions.show', [$inscription->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('inscriptions.edit', [$inscription->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>