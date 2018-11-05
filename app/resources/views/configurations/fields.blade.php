<!-- Academic Period Field -->
<div class="form-group col-sm-6">
    {!! Form::label('academic_period', 'Academic Period:') !!}
    {!! Form::text('academic_period', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Credit Units Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_credit_units', 'Min Credit Units:') !!}
    {!! Form::text('min_credit_units', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Hour Community Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_hour_community_service', 'Min Hour Community Service:') !!}
    {!! Form::text('min_hour_community_service', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Hour Weeks Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_hour_weeks', 'Min Hour Weeks:') !!}
    {!! Form::text('min_hour_weeks', null, ['class' => 'form-control']) !!}
</div>

<!-- Registration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_date', 'Registration Date:') !!}
    {!! Form::date('registration_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Registration Final Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registration_final_date', 'Registration Final Date:') !!}
    {!! Form::date('registration_final_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Int Community Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_int_community_service', 'Date Int Community Service:') !!}
    {!! Form::date('date_int_community_service', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Fin Community Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_fin_community_service', 'Date Fin Community Service:') !!}
    {!! Form::date('date_fin_community_service', null, ['class' => 'form-control']) !!}
</div>

<!-- Coordinator Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coordinator_full_name', 'Coordinator Full Name:') !!}
    {!! Form::text('coordinator_full_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Coordinator Identification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coordinator_identification', 'Coordinator Identification:') !!}
    {!! Form::text('coordinator_identification', null, ['class' => 'form-control']) !!}
</div>

<!-- Coordinator Identification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('configurations.index') !!}" class="btn btn-default">Cancel</a>
</div>
