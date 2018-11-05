<table class="table table-responsive" id="downloadables-table">
    <thead>
        <tr>
            <th>Archive</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($downloadables as $downloadable)
        <tr>
            <td>{!! $downloadable->archive !!}</td>
            <td>{!! $downloadable->status !!}</td>
            <td>
                {!! Form::open(['route' => ['downloadables.destroy', $downloadable->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('downloadables.show', [$downloadable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('downloadables.edit', [$downloadable->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>