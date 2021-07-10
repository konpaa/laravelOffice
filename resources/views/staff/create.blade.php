{{ Form::model($staff, ['url' => route('staff.store')]) }}
@include('staff.form')
{{ Form::submit('Создать') }}
{{ Form::close() }}
