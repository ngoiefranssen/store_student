<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentRecycleController extends Controller
{
    public function index()
    {
        $resotres_deletes = Department::onlyTrashed()->get();

        return view('recycle.recycle_department.ecycle_department', compact('resotres_deletes'));
    }

    public function departmentRestore($id)
    {
        $department_restore = Department::withTrashed()->find($id);
        $department_restore->restore();

        return back()->with('succes', '');
    }

    public function finaleDeleteDepart($id)
    {
        $finaldelete = Department::onlyTrashed()->find($id);
        $finaldelete->forceDelete();

        return back()->with('Succes', '');
    }
}
