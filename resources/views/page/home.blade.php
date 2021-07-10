@extends('layouts.app')

@section('content')

<a href="{{route('staff.create')}}">Create staff</a>
<a href="{{route('staff.index')}}">Show staff</a>
<a href="{{route('departments.index')}}">Show department</a>
<a href="{{route('departments.create')}}">Create department</a>
<br>
<table class="table">
    <thead>
    <tr>
        <th class="col">#</th>
        @foreach ($departments as $department)
            <th class="col">{{$department->name}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($staff as $person)
    <tr>
        <th scope="row">{{$person->firstName . $person->lastName}}</th>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
