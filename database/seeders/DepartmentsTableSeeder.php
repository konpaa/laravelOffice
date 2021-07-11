<?php


namespace Database\Seeders;


use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    public function run()
    {
        $dev = new Department();
        $dev->name = 'Dev';
        $dev->save();

        $hr = new Department();
        $hr->name = 'hr';
        $hr->save();
    }
}
