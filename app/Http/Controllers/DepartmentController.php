<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    public function create()
    {
        $department = new Department();
        return view('department.create', compact('department'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:departments'
        ]);

        $department = new Department();
        $department->fill($data);

        $department->save();

        return redirect()
            ->route('home');
    }
}
