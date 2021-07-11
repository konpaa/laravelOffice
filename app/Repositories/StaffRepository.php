<?php

namespace App\Repositories;

use App\Models\Staff;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as Col;
use Illuminate\Support\Facades\DB;

class StaffRepository implements StaffRepositoryInterface
{
    public function all(): Collection
    {
        return Staff::all();
    }

    public function save(array $data): Staff
    {
        $staff = new Staff();
        $staff->fill($data);
        $staff->save();
        return $staff;
    }

    public function saveDepartment(Staff $staff, int $idDepartment): Staff
    {
        $staff->departments()->attach($idDepartment);
        return $staff;
    }

    public function removeDepartment(Staff $staff, int $idDepartment): Staff
    {
        $staff->departments()->detach($idDepartment);
        return $staff;
    }

    public function getIdDepartmentsInWhichHeWorks(int $idStaff): Col
    {
        return DB::table('staff')
            ->join('department_staff', 'staff.id', '=', 'department_staff.staff_id')
            ->select('department_staff.department_id')
            ->where('staff.id', '=', $idStaff)
            ->get();
    }

    public function destroy(Staff $staff): void
    {
        $staff->departments()->detach();
        $staff->delete();
    }
}
