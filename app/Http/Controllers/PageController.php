<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Staff;

class PageController extends Controller
{
    public function home()
    {
        $departments = Department::all();
        $staff = Staff::all();
        return view('page.home', compact('departments'), compact('staff'));
    }
}
