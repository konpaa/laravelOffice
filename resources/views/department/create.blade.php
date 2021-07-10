@extends('layouts.app')

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
{{ Form::model($department, ['url' => route('departments.store'), 'class' => 'd-flex justify-content-center flex-column']) }}
{{ Form::label('name', 'Название') }}
{{ Form::text('name') }}<br>
{{ Form::submit('Создать', ['class' => 'btn btn-lg btn-primary ms-md-3 px-5 text-uppercase']) }}
{{ Form::close() }}
@endsection
