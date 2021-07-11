<?php

namespace App\Services;

use App\Models\Staff;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;

/**
 * Class SaveObjectServices
 * @package App\Services
 */
class SaveObjectServices
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
     * SaveObjectServices constructor.
     * @param StaffRepositoryInterface $staffRepository
     * @param DepartmentsRepositoryInterface $departmentsRepository
     */
    public function __construct(
        StaffRepositoryInterface $staffRepository,
        DepartmentsRepositoryInterface $departmentsRepository
    ) {
        $this->staffRepository = $staffRepository;
        $this->departmentsRepository = $departmentsRepository;
    }

    /**
     * @param array|int $departmentsId
     * @param Staff $staff
     */
    public function saveDepartmentsInStaff(array|int $departmentsId, Staff $staff): void
    {
        foreach ($departmentsId as $id) {
            $this->staffRepository->saveDepartment($staff, $id);
        }
    }

    /**
     * @param array|int $departmentsId
     * @param Staff $staff
     */
    public function saveNewDepartmentsInStaff(array|int $departmentsId, Staff $staff): void
    {
        foreach ($departmentsId as $id) {
            if ($staff->departments()->find($id)) {
                continue;
            }
            $this->staffRepository->saveDepartment($staff, $id);
        }
    }

    /**
     * @param array|int $departmentsId
     * @param Staff $staff
     */
    public function saveRemainingDepartments(array|int $departmentsId, Staff $staff): void
    {
        foreach ($this->departmentsRepository->remainingDepartments($departmentsId) as $item) {
            $this->staffRepository->removeDepartment($staff, $item->id);
        }
    }
}
