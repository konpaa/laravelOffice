@extends('layouts.app')
@section('title')
    updateDepartments
@endsection
@section('content')


@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
{{ Form::model($department, ['url' => route('departments.update', $department), 'method' => 'PATCH']) }}
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::submit('Обновить', ['class' => 'btn btn-lg btn-primary ms-md-3 px-5 text-uppercase'])}}
{{ Form::close() }}
@endsection
