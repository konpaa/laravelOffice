<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    public function run()
    {
        $staff1 = new Staff();
        $staff1->firstName = 'Konpa';
        $staff1->lastName = 'Konpa';
        $staff1->patronymic = '';
        $staff1->gender = 'M';
        $staff1->wage = 400;
        $staff1->save();
        $staff1->departments()->attach(Department::find('1'));

        $staff2 = new Staff();
        $staff2->firstName = 'User';
        $staff2->lastName = 'User';
        $staff2->patronymic = '';
        $staff2->gender = 'F';
        $staff2->wage = 900;
        $staff2->save();
        $staff2->departments()->attach(Department::find('2'));

        $staff3 = new Staff();
        $staff3->firstName = 'User2';
        $staff3->lastName = 'User2';
        $staff3->patronymic = '';
        $staff3->gender = 'M';
        $staff3->wage = 1233;
        $staff3->save();
        $staff3->departments()->attach(Department::find('2'));
        $staff3->departments()->attach(Department::find('1'));
    }
}
