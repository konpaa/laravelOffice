
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::label('firstName', 'firstName') }}
{{ Form::text('firstName') }}<br>
{{ Form::label('lastName', 'lastName') }}
{{ Form::text('lastName') }}<br>
{{ Form::label('patronymic', 'patronymic') }}
{{ Form::text('patronymic') }}<br>
{{ Form::label('gender', 'gender') }}
{{ Form::select('gender', array('M' => 'Male', 'F' => 'Flame')) }}<br>
{{ Form::label('wage', 'wage') }}
{{ Form::number('wage') }}<br>

@foreach($departments as $department)
    {{ Form::label('department_id', $department->name) }}
    {{ Form::checkbox('department_id[]', $department->id)}}<br>
@endforeach
