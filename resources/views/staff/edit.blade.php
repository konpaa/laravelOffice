{{ Form::model($staff, ['url' => route('staff.update', $staff), 'method' => 'PATCH']) }}
@include('staff.form')
{{ Form::submit('Обновить') }}
{{ Form::close() }}
