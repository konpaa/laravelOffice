@extends('layouts.app')

@section('content')

<h1>Hello</h1>
<a href="{{route('department.create')}}">Create department</a>
<a href="{{route('staff.create')}}">Create staff</a>
<a href="{{route('staff.index')}}">Show staff</a>
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
    @foreach($employees as $employee)
    <tr>
        <th scope="row">{{$employee->firstName . $employee->lastName}}</th>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
