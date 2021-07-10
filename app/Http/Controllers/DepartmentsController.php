<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class DepartmentsController extends Controller
{
    private StaffController $staffController;

    /**
     * DepartmentsController constructor.
     * @param StaffController $staffController
     */
    public function __construct(StaffController $staffController)
    {
        $this->staffController = $staffController;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View
    {
        $departments = Department::all();
        foreach ($departments as $department) {
            $max = DB::table('staff')
                ->join('department_staff', 'staff.id', '=', 'department_staff.staff_id')
                ->select('staff.wage', 'department_staff.department_id')
                ->where('department_staff.department_id', '=', $department->id)
                ->max('staff.wage');
            $department->maxWage = $max;
            $department->numberOfEmployees = $this->staffController
                ->addNewNumberOfEmployeesDepartments($department->id);
        }

        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View
    {
        $department = new Department();
        return view('department.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Application|Factory|View
     */
    public function show(Department $department): View
    {
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Application|Factory|View
     */
    public function edit(Department $department): View
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Department $department): RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:departments'
        ]);

        $department->fill($data);

        $department->save();

        return redirect()
            ->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department): RedirectResponse
    {
        if ($department && $department->staff()->count() == 0) {
            $department->delete();
        }

        return redirect()
            ->route('home');
    }
}
