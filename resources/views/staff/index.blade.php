@extends('layouts.app')
@section('title')
    showStaff
@endsection
@section('content')

<table class="table table-borderless">
<thead>
<tr>
    <th scope="col">FirstName</th>
    <th scope="col">SurName</th>
    <th scope="col">Patronymic</th>
    <th scope="col">Gender</th>
    <th scope="col">Wage</th>
    <th scope="col">Departments</th>
</tr>
</thead>
    <tbody>
    @foreach($staff as $person)
        <th scope="row">{{$person->firstName}}</th>
        <th scope="row">{{$person->lastName}}</th>
        <th scope="row">{{$person->patronymic}}</th>
        <th scope="row">{{$person->gender}}</th>
        <th scope="row">{{$person->wage}}</th>
        <th scope="row">
            {{$person->departments()->pluck('name')->implode(', ')}}
        </th>
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

