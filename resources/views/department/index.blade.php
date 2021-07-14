@extends('layouts.app')

@section('title')
    showDepartments
@endsection
@section('content')

<table class="table table-borderless">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">numberOfEmployees</th>
        <th scope="col">maxWage</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
        <th scope="row">{{$department->name}}</th>
        <th scope="row">{{$department->numberOfEmployees}}</th>
        <th scope="row">{{$department->maxWage}}</th>
        <th>
            <a href="{{route('departments.edit', $department)}}">Update</a>
        </th>
        <th>
            <form id="deleted" method="POST" action="{{ route('departments.destroy', $department) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-icon">
                    Delete
                    <i data-feather="delete"></i>
                </button>
            </form>
        </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
