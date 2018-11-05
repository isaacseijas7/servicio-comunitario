<table class="table table-responsive" id="students-table">
    <thead>
        <tr>
            <th>Unitis Of Credit</th>
        <th>Skills And Abilites</th>
        <th>Knowledge</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{!! $student->unitis_of_credit !!}</td>
            <td>{!! $student->skills_and_abilites !!}</td>
            <td>{!! $student->knowledge !!}</td>
            <td>{!! $student->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('students.show', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('students.edit', [$student->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>