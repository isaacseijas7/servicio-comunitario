<table class="table table-responsive" id="tutors-table">
    <thead>
        <tr>
            <th>Type</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tutors as $tutor)
        <tr>
            <td>{!! $tutor->type !!}</td>
            <td>{!! $tutor->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['tutors.destroy', $tutor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tutors.show', [$tutor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tutors.edit', [$tutor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>