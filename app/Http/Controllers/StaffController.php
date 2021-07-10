<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View
    {
        $staff = new Staff();
        $departments = Department::all();
        return view('staff.create', compact('staff'), compact('departments'));
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
            'firstName' => 'required:staff',
            'lastName' => 'required:staff',
            'patronymic' => '',
            'gender' => '',
            'wage' => '',
            'department_id' => 'required:staff'
        ]);

        $staff = new Staff();
        $staff->fill($data);
        $staff->save();

        $departmentsId = $request->input('department_id');
        foreach ($departmentsId as $id) {
            $departments = Department::all()->where('id', $id);
            $staff->departments()->attach($departments);
        }

        return redirect()
            ->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Staff $staff
     * @return Application|Factory|View
     */
    public function show(Staff $staff): View
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Staff $staff
     * @return Application|Factory|View
     */
    public function edit(Staff $staff): View
    {
        $departments = Department::all();

        return view('staff.edit', [
            'staff' => $staff,
            'departments' => $departments,
            'id' => $staff->id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Staff $staff
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, Staff $staff): RedirectResponse
    {
        $data = $this->validate($request, [
            'firstName' => 'required:staff',
            'lastName' => 'required:staff',
            'patronymic' => '',
            'gender' => '',
            'wage' => '',
            'department_id' => 'required:staff'
        ]);
        $staff->fill($data);
        $staff->save();

        $departmentsId = $request->input('department_id');
        foreach ($departmentsId as $id) {
            $departments = Department::all()->where('id', $id);
            $staff->departments()->attach($departments);
        }

        return redirect()
            ->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Staff $staff
     * @return RedirectResponse
     */
    public function destroy(Staff $staff): RedirectResponse
    {
        if ($staff) {
            $staff->departments()->detach();
            $staff->delete();
        }

        return redirect()
            ->route('home');
    }
}
