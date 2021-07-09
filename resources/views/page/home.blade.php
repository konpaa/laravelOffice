@extends('layouts.app')

@section('content')

<h1>Hello</h1>
<table class="table">
    <thead>
    <tr>
        <th class="col">#</th>
        @foreach ($departments as $department)
            <th class="col">{{$department->name}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
    <tr>
        <th scope="row">{{$employee->firstName . $employee->lastName}}</th>
    </tr>
    @endforeach
    </tbody>
@endforeach
</table>
@endsection
