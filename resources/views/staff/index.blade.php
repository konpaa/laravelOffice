@extends('layouts.app')

@section('content')

<table class="table">
<thead>
<tr>
    <th class="col">FirstName</th>
    <th class="col">SurName</th>
    <th class="col">Patronymic</th>
    <th class="col">Gender</th>
    <th class="col">Wage</th>
{{--    <th class="col">Departments</th>--}}
</tr>
</thead>
    <tbody>
    @foreach($staff as $person)
        <th scope="row">{{$person->firstName}}</th>
        <th scope="row">{{$person->lastName}}</th>
        <th scope="row">{{$person->patronymic}}</th>
        <th scope="row">{{$person->gender}}</th>
        <th scope="row">{{$person->wage}}</th>
{{--        <th scope="row">--}}
{{--        @foreach($person->departments as $department)--}}
{{--        {{$department->name}}--}}
{{--        @endforeach--}}
{{--        </th>--}}
        <th>
            <a href="{{route('staff.edit', $person)}}">Update</a>
        </th>
    <th>
            <form method="POST" action="{{ route('staff.destroy', $person) }}">
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

