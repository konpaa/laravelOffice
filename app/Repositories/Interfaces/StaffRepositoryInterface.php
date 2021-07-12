<?php


namespace App\Repositories\Interfaces;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Col;

interface StaffRepositoryInterface
{
    public function all(): Collection;
    public function save(Staff $staff, array $data): Staff;
    public function saveDepartment(Staff $staff, int $idDepartment): Staff;
    public function removeDepartment(Staff $staff, int $idDepartment): Staff;
    public function getIdDepartmentsInWhichHeWorks(int $idStaff): Col;
    public function destroy(Staff $staff): void;
}
