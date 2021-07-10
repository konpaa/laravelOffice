{{ Form::model($department, ['url' => route('departments.update', $department), 'method' => 'PATCH']) }}
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::model($department, ['url' => route('departments.store')]) }}
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::submit('Обновить') }}
{{ Form::close() }}
