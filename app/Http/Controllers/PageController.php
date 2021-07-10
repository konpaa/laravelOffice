<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
        $departments = Department::all();
        $staff = Staff::all();
        return view('page.home', compact('departments'), compact('staff'));
    }

    public function jsonResponse()
    {
        $staff = DB::table('department_staff')
            ->select('*')
            ->get()
            ->toArray();
        return new JsonResponse($staff);
    }
}
