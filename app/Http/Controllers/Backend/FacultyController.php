<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultes = Faculty::get();

        return view('faculty.index', compact('facultes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faculty = $request->validate([

            'faculty_name' => 'required|max:50',
        ],
        [
            'faculty_name.required' => 'Please complete the name',
        ]);

        Faculty::create($faculty);
        return redirect()->route('faculty.index')->with('Succes', 'faculty to create successfully');

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
        $faculty = Faculty::find($id);
        return view('faculty.edit', compact('faculty'));
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
        $validite_faculty = $request->validate([

            'faculty_name' => ['required'],
        ],
        [
            'faculty_name.required' => 'Please complete the name',
        ]);
        Faculty::find($id)->update([

            'faculty_name' => $request->faculty_name,
        ]);

        return redirect()->route('faculty.index')->with('Succes', 'Congratulations on the change! faculty modify successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id);
        $faculty->delete();

      return back()->with('Succes', 'faculty deleted successfully');
    }

    public function deleteFaculty($id)
    {
        $faculty = Faculty::find($id);
        $faculty->delete();

        return back()->with('Succes', 'faculty deleted successfully');
    }

}
