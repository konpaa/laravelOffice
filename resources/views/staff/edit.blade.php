@extends('layouts.app')

@section('content')

{{ Form::model($staff, ['url' => route('staff.update', $staff), 'method' => 'PATCH', 'class' => 'd-flex justify-content-center flex-column']) }}
@include('staff.form')
{{ Form::submit('Обновить', ['class' => 'btn btn-lg btn-primary ms-md-3 px-5 text-uppercase']) }}
{{ Form::close() }}
@endsection
