<?php


namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Col;
use Illuminate\Support\Facades\DB;

/**
 * Class DepartmentsRepository
 * @package App\Repositories
 */
class DepartmentsRepository implements DepartmentsRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        foreach (Department::all() as $item) {
            $item->update([
                'name' => $item->name,
                'numberOfEmployees' => $this->findNumberOfEmployeesDepartments($item->id),
                'maxWage' => $this->maxWageStaff($item->id)
            ]);
        }
        return Department::all();
    }

    /**
     * @param int $departmentId
     * @return int
     */
    public function findNumberOfEmployeesDepartments(int $departmentId): int
    {
        return DB::table('departments')
            ->join('department_staff', 'departments.id', '=', 'department_staff.department_id')
            ->select('department_staff.staff_id')
            ->where('departments.id', '=', $departmentId)
            ->count();
    }

    /**
     * @param Department $department
     * @param array $data
     * @return Department
     */
    public function save(Department $department, array $data): Department
    {
        $department->fill($data);
        $department->save();
        return $department;
    }

    /**
     * @param Department $department
     */
    public function delete(Department $department): void
    {
        $department->delete();
    }

    /**
     * @param array|int $departmentId
     * @return Col
     */
    public function remainingDepartments(array|int $departmentId): Col
    {
        return DB::table('departments')
            ->whereNotIn('id', $departmentId)
            ->get();
    }

    /**
     * @param int $departmentId
     * @return int
     */
    public function maxWageStaff(int $departmentId): int
    {
        return DB::table('staff')
            ->join('department_staff', 'staff.id', '=', 'department_staff.staff_id')
            ->select('staff.wage', 'department_staff.department_id')
            ->where('department_staff.department_id', '=', $departmentId)
            ->max('staff.wage') ?? 0;
    }

    /**
     * @param Department $department
     * @param int $staffId
     */
    public function saveStaff(Department $department, int $staffId): void
    {
        $department->staff()->attach($staffId);
    }
}
