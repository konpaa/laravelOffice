@extends('layouts.app')

@section('title')
    showDepartments
@endsection
@section('content')

<table class="table">
    <thead>
    <tr>
        <th class="col">Name</th>
        <th class="col">numberOfEmployees</th>
        <th class="col">maxWage</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $department)
        <tr>
        <th scope="row">{{$department->name}}</th>
        <th scope="row">{{$department->numberOfEmployees}}</th>
        <th scope="row">{{$department->maxWage}}</th>

{{--            @if(count($department->staff) > 0)--}}
{{--        <th>--}}
{{--            @foreach($department->staff as $person)--}}
{{--                /{{$person->firstName}} {{$person->lastName}}/--}}
{{--            @endforeach--}}
{{--        </th>--}}
{{--            @endif--}}
        <th>
            <a href="{{route('departments.edit', $department)}}">Update</a>
        </th>
        <th>
            <form method="POST" action="{{ route('departments.destroy', $department) }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger btn-icon">
                    Delete<i data-feather="delete"></i>
                </button>
            </form>
        </th>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
