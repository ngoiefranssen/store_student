<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentCreateRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::get();
        $levels = Level::get();

        return view('departments.create', compact('faculties', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateded = $request->validate(
            [
                'name' => 'required|max:50',
                'faculty_id' => 'required',
                'level_id' => 'required',
            ],
            [
                'name.required' => 'Please complete the name field for registration',
                'faculty_id.required' => 'choose the corresponding faculty for registration',
                'level_id' => 'choose the corresponding level for recording',
            ]
        );

        // Department::insert([

        //     'name' => $request->name,
        //     'faculty_id' => $request->faculty_id,
        //     'level_id' => $request->level_id,
        //     'created_at' => Carbon::new(),
        // ]);

        Department::create($validateded);

        return redirect()->route('departments.index')->with('Success', 'the department was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        $faculties = Faculty::get();
        $levels = Level::get();

        return view('departments.edit', compact('department', 'faculties', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validateded_datas = $request->validate(
            [
                'name' => 'required|max:50',
                'faculty_id' => 'required',
                'level_id' => 'required',
            ],
            [

                'name.required' => 'Please complete the name field for registration',
                'faculty_id.required' => 'choose the corresponding faculty for registration',
                'level_id' => 'choose the corresponding level for recording',
            ]
        );

        Department::find($id)->update([

            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
            'level_id' => $request->level_id,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('departments.index')->with('Succes', 'department successfully modified');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();

        return back()->with('Succes', '');
    }
}
