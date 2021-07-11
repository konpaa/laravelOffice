<?php


namespace App\Repositories\Interfaces;

use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Col;

interface DepartmentsRepositoryInterface
{
    public function all():Collection;
    public function findNumberOfEmployeesDepartments(int $departmentId): int;
    public function save(Department $department, array $data): Department;
    public function delete(Department $department): void;
    public function remainingDepartments(int $departmentId): Col;
    public function maxWageStaff(int $departmentId): int;
    public function saveStaff(Department $department, int $staffId): void;
}
