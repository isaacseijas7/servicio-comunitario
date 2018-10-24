<table class="table table-responsive" id="companies-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Identification</th>
        <th>Location State</th>
        <th>Location</th>
        <th>Domicile</th>
        <th>Phone</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{!! $company->name !!}</td>
            <td>{!! $company->identification !!}</td>
            <td>{!! $company->location_state !!}</td>
            <td>{!! $company->location !!}</td>
            <td>{!! $company->domicile !!}</td>
            <td>{!! $company->phone !!}</td>
            <td>{!! $company->email !!}</td>
            <td>
                {!! Form::open(['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('companies.show', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('companies.edit', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>