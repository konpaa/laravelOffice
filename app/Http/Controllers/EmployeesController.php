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
        ]);

        $employees = new Staff();
        $employees->fill($data);

        $employees->save();

        return redirect()
            ->route('home');
    }
}
