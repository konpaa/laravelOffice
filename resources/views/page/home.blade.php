@extends('layouts.app')
@section('title')
    home
@endsection
@section('content')
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Staff</th>
        @foreach ($departments as $department)
            <th scope="col">{{$department->name}}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($staff as $person)
    <tr>
        <th scope="row" id="{{$person->id}}}}">{{$person->firstName . "  ".$person->lastName}}</th>
        @foreach ($departments as $department)
            <td id="{{$department->id . $person->id}}"></td>
        @endforeach
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
