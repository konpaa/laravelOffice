<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffPostRequest;
use App\Models\Staff;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Services\SaveObjectServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class StaffController
 * @package App\Http\Controllers
 */
class StaffController extends Controller
{
    /**
     * @var StaffRepositoryInterface
     */
    private StaffRepositoryInterface $staffRepository;

    /**
     * @var DepartmentsRepositoryInterface
     */
    private DepartmentsRepositoryInterface $departmentsRepository;

    /**
     * @var SaveObjectServices
     */
    private SaveObjectServices $saveObjectServices;

    /**
     * StaffController constructor.
     * @param StaffRepositoryInterface $staffRepository
     * @param DepartmentsRepositoryInterface $departmentsRepository
     * @param SaveObjectServices $saveObjectServices
     */
    public function __construct(
        StaffRepositoryInterface $staffRepository,
        DepartmentsRepositoryInterface $departmentsRepository,
        SaveObjectServices $saveObjectServices
    ) {
        $this->staffRepository = $staffRepository;
        $this->departmentsRepository = $departmentsRepository;
        $this->saveObjectServices = $saveObjectServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('staff.index', ['staff' => $this->staffRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('staff.create', [
            'staff' => new Staff(),
            'departments' => $this->departmentsRepository->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StaffPostRequest $request
     * @return RedirectResponse
     */
    public function store(StaffPostRequest $request): RedirectResponse
    {
        $this->saveObjectServices->saveDepartmentsInStaff(
            $request->input('department_id'),
            $this->staffRepository->save(new Staff(), $request->all())
        );

        return redirect()
            ->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Staff $staff
     * @return View
     */
    public function show(Staff $staff): View
    {
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Staff $staff
     * @return View
     */
    public function edit(Staff $staff): View
    {
        return view('staff.edit', [
            'staff' => $staff,
            'departments' => $this->departmentsRepository->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StaffPostRequest $request
     * @param Staff $staff
     * @return RedirectResponse
     */
    public function update(StaffPostRequest $request, Staff $staff): RedirectResponse
    {
        $newStaff = $this->staffRepository->save($staff, $request->all());

        $this->saveObjectServices->saveNewDepartmentsInStaff($request->input('department_id'), $newStaff);

        $this->saveObjectServices->saveRemainingDepartments($request->input('department_id'), $newStaff);

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
            $this->staffRepository->destroy($staff);
        }
        return redirect()
            ->route('home');
    }
}
