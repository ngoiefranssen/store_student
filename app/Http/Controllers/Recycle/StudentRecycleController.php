<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentRecycleController extends Controller
{
    public function index()
    {
        $studentsdeletes = Student::onlyTrashed()->get();

        return view('recycle.recylce_student.recycle_student', compact('studentsdeletes'));
    }

    public function restorationStudent($id)
    {
        $studentrestor = Student::withTrashed()->find($id);
        $studentrestor->restore();

        return back()->with('Success', 'the student was successfully restored');
    }

    public function finaleDelete($id)
    {
        $definitifDeleteStudent = Student::onlyTrashed()->find($id);
        unlink($definitifDeleteStudent->image_url);
        $definitifDeleteStudent->forceDelete();

        return back()->with('Success', 'Product supprime defini avec succes');
    }
}
