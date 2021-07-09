<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeesController extends Controller
{
    public function create()
    {
        $employees = new Staff();
        $departments = Department::all();
        return view('employees.create', compact('employees'), compact('departments'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'firstName' => 'required:staff',
            'lastName' => 'required:staff',
            'patronymic' => '',
            'gender' => '',
            'wage' => '',
            'department_id' => 'required:staff'
        ]);

        $employees = new Staff();
        $employees->fill($data);

        $employees->save();

        $departmentsId = $request->input('department_id');
        foreach ($departmentsId as $id) {
            $departments = Department::all()->where('id', $id);
            $employees->departments()->attach($departments);
        }

        return redirect()
            ->route('home');
    }

    public function show()
    {
        $employees = Staff::all();
        return view('employees.show', compact('employees'));
    }
}
