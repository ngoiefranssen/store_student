<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyRecycleController extends Controller
{
    public function index()
    {
        $facultyRestoreDeletes = Faculty::onlyTrashed()->get();

        return view('recycle.recycle_faculty.recycle_faculty', compact('facultyRestoreDeletes'));
    }

    public function restoreFaculty($id)
    {
        $facultyRestore = Faculty::withTrashed()->find($id);
        $facultyRestore->restore();

        return back()->with('Succes', 'faculty to restore successfully');
    }

    public function finalDeleteFacullty($id)
    {
        $deleteFaculty = Faculty::onlyTrashed()->find($id);
        $deleteFaculty->forceDelete();

        return back()->with('Succes', 'faculty deleted successfully');

    }
}
