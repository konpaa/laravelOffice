<table class="table">
<thead>
<tr>
    <th class="col">FirstName</th>
    <th class="col">SurName</th>
    <th class="col">Patronymic</th>
    <th class="col">Gender</th>
    <th class="col">Wage</th>
    <th class="col">Departments</th>
</tr>
</thead>
    <tbody>
    @foreach($employees as $employee)
    <tr>
        <th scope="row">{{$employee->firstName}}</th>
        <th scope="row">{{$employee->lastName}}</th>
        <th scope="row">{{$employee->patronymic}}</th>
        <th scope="row">{{$employee->gender}}</th>
        <th scope="row">{{$employee->wage}}</th>
        <th scope="row">
        @foreach($employee->departments as $department)
        {{$department->name}}
        @endforeach
        </th>
    </tr>
    @endforeach
    </tbody>
</table>
