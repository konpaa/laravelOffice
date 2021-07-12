{{ Form::label('firstName', 'firstName') }}
{{ Form::text('firstName') }}<br>
{{ Form::label('lastName', 'lastName') }}
{{ Form::text('lastName') }}<br>
{{ Form::label('patronymic', 'patronymic') }}
{{ Form::text('patronymic') }}<br>
{{ Form::label('gender', 'gender') }}
{{ Form::select('gender', array('M' => 'Male', 'F' => 'Female')) }}<br>
{{ Form::label('wage', 'wage') }}
{{ Form::number('wage') }}<br>

@if(count($staff->departments) > 0)

    @foreach($departments as $department)

    @endforeach
    @foreach($staff->departments as $department)
        {{ Form::label('department_id', $department->name) }}
        {{ Form::checkbox('department_id[]', $department->id, true)}}<br>
    @endforeach
    <br>
    <br>
    {{ Form::label('Взможные', "Возможные:") }}
    @foreach($departments as $department)
        {{ Form::label('department_id', $department->name) }}
        {{ Form::checkbox('department_id[]', $department->id)}}<br>
    @endforeach
@else
    @foreach($departments as $department)
        {{ Form::label('department_id', $department->name) }}
        {{ Form::checkbox('department_id[]', $department->id)}}<br>
    @endforeach
@endif
