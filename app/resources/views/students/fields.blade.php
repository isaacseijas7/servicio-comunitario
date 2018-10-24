<!-- Unitis Of Credit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unitis_of_credit', 'Unitis Of Credit:') !!}
    {!! Form::text('unitis_of_credit', null, ['class' => 'form-control']) !!}
</div>

<!-- Skills And Abilites Field -->
<div class="form-group col-sm-6">
    {!! Form::label('skills_and_abilites', 'Skills And Abilites:') !!}
    {!! Form::text('skills_and_abilites', null, ['class' => 'form-control']) !!}
</div>

<!-- Knowledge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('knowledge', 'Knowledge:') !!}
    {!! Form::text('knowledge', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('students.index') !!}" class="btn btn-default">Cancel</a>
</div>
