<table class="table table-responsive" id="people-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Last Name</th>
        <th>Identification</th>
        <th>Gender</th>
        <th>Birthdate</th>
        <th>Location State</th>
        <th>Location</th>
        <th>Domicile</th>
        <th>Phone</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($people as $person)
        <tr>
            <td>{!! $person->name !!}</td>
            <td>{!! $person->last_name !!}</td>
            <td>{!! $person->identification !!}</td>
            <td>{!! $person->gender !!}</td>
            <td>{!! $person->birthdate !!}</td>
            <td>{!! $person->location_state !!}</td>
            <td>{!! $person->location !!}</td>
            <td>{!! $person->domicile !!}</td>
            <td>{!! $person->phone !!}</td>
            <td>{!! $person->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['people.destroy', $person->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('people.show', [$person->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('people.edit', [$person->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>