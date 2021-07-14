<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentPostRequest;
use App\Models\Department;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DepartmentsController extends Controller
{

    private DepartmentsRepositoryInterface $departmentsRepository;

    /**
     * DepartmentsController constructor.
     * @param DepartmentsRepositoryInterface $departmentsRepository
     */
    public function __construct(DepartmentsRepositoryInterface $departmentsRepository)
    {
        $this->departmentsRepository = $departmentsRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('department.index', ['departments' => $this->departmentsRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('department.create', ['department' => new Department()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentPostRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentPostRequest $request): RedirectResponse
    {
        $this->departmentsRepository->save(new Department(), $request->all());

        return redirect()
            ->route('home')->with('success', 'Created success');
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function show(Department $department): View
    {
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return View
     */
    public function edit(Department $department): View
    {
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentPostRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentPostRequest $request, Department $department): RedirectResponse
    {
        $this->departmentsRepository->save($department, $request->all());

        return redirect()
            ->route('home')->with('success', 'Update success');
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
            $this->departmentsRepository->delete($department);
            return redirect()
                ->route('home')->with('success', 'Deleted success');
        }

        return redirect()
            ->route('home')->with('warning', 'Department have staff!');
    }
}
