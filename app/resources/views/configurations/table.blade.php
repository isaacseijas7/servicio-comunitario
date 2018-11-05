<table class="table table-responsive" id="configurations-table">
    <thead>
        <tr>
            <th>Academic Period</th>
            <!-- <th>Min Credit Units</th>
            <th>Min Hour Community Service</th>
            <th>Min Hour Weeks</th> -->
            <!-- <th>Registration Date</th>
            <th>Registration Final Date</th>
            <th>Date Int Community Service</th>
            <th>Date Fin Community Service</th> -->
            <th>Coordinator Full Name</th>
            <th>Coordinator Identification</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($configurations as $configuration)
        <tr>
            <td>{!! $configuration->academic_period !!}</td>
            <!-- <td>{!! $configuration->min_credit_units !!}</td>
            <td>{!! $configuration->min_hour_community_service !!}</td>
            <td>{!! $configuration->min_hour_weeks !!}</td>
            <td>{!! $configuration->registration_date !!}</td>
            <td>{!! $configuration->registration_final_date !!}</td>
            <td>{!! $configuration->date_int_community_service !!}</td>
            <td>{!! $configuration->date_fin_community_service !!}</td> -->
            <td>{!! $configuration->coordinator_full_name !!}</td>
            <td>{!! $configuration->coordinator_identification !!}</td>
            <td>{!! $configuration->status !!}</td>
            <td>
                {!! Form::open(['route' => ['configurations.destroy', $configuration->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('configurations.show', [$configuration->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('configurations.edit', [$configuration->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>