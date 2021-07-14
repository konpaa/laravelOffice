@extends('layouts.app')
@section('title')
    crateDepartments
@endsection
@section('content')
{{ Form::model($department, ['url' => route('departments.store'), 'class' => 'd-flex justify-content-center flex-column']) }}
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::submit('Создать', ['class' => 'btn btn-lg btn-primary ms-md-3 px-5 text-uppercase']) }}
{{ Form::close() }}
@endsection
