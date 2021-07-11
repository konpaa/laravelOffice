<?php


namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Col;
use Illuminate\Support\Facades\DB;

class DepartmentsRepository implements DepartmentsRepositoryInterface
{

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

    public function findNumberOfEmployeesDepartments(int $departmentId): int
    {
        return DB::table('departments')
            ->join('department_staff', 'departments.id', '=', 'department_staff.department_id')
            ->select('department_staff.staff_id')
            ->where('departments.id', '=', $departmentId)
            ->count();
    }

    public function save(Department $department, array $data): Department
    {
        $department->fill($data);
        $department->save();
        return $department;
    }

    public function delete(Department $department): void
    {
        $department->delete();
    }

    public function remainingDepartments($departmentId): Col
    {
        return DB::table('departments')
            ->whereNotIn('id', $departmentId)
            ->get();
    }

    public function maxWageStaff(int $departmentId): int
    {
        return DB::table('staff')
            ->join('department_staff', 'staff.id', '=', 'department_staff.staff_id')
            ->select('staff.wage', 'department_staff.department_id')
            ->where('department_staff.department_id', '=', $departmentId)
            ->max('staff.wage') ?? 0;
    }

    public function saveStaff(Department $department, int $staffId): void
    {
        $department->staff()->attach($staffId);
    }
}
