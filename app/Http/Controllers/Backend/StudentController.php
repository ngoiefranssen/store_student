<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();
        $students = Student::paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student = $request->validate([

            'name_student' => 'required|max:20',
            'fisrt_name' => 'required|max:20',
            'kind' => 'required|max:10',
            'registration_number' => 'required|max:20',
            'image_url' => 'image|mimes:jpg, png, jpeg',

        ],
        [
            'name_student.required' => 'Please complete the field !',
            'fisrt_name.required' => 'the first name field is mandatory, please complete it!',
            'kin.required' => 'it is necessary to complete the field in front of you the kind',
            'registration_number.required' => 'Please enter the registration number !',
            'image_url.required' => 'Please choose a photo!',
        ]);

        $image_traiter = $request->image_url;

        $extension_image = strtolower($image_traiter->getClientOriginalExtension());
        $image_name = hexdec(uniqid());
        $full_image = $image_name. '.' .$extension_image;

        $image_scktoge = "images/images_students/";
        $db_image = $image_scktoge.$full_image;
        $image_traiter->move($image_scktoge, $full_image);

        Student::insert([

            'name_student' => $request->name_student,
            'fisrt_name' => $request->fisrt_name,
            'kind' => $request->kind,
            'registration_number' => $request->registration_number,
            'created_at' => Carbon::now(),
            'image_url' => $db_image,
        ]);

        // dd($student);

        // $path = $request->file('image_url')->store('/', 'public');


        // Student::create(
        //     array_merge(
        //         Arr::except($student, 'image_url'),
        //         ['image_url' => $path]
        //     )
        // );

        return redirect()->route('students.index')->with('Succes', 'the student create successfully');
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
        $student = Student::find($id);

        return view('students.edit', compact('student'));
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

        $validete_Student = $request->validate(
            [
                'name_student' => ['required'],
                'fisrt_name' => ['required'],
                'kind' => ['required'],
                'registration_number' => ['required'],
                //'image_url' => ['required'],
            ],

            [
                'name_student.required' => 'Please complete the field !',
                'fisrt_name.required' => 'the first name field is mandatory, please complete it!',
                'kin.required' => 'it is necessary to complete the field in front of you the kind',
                'registration_number.required' => 'Please enter the registration number !',
                'image_url.required' => 'Please choose a photo!',
            ]

        );

        $image_ancien = $request->ancien_image;
        $image_traiter = $request->image_url;

        if ($image_traiter)
        {

            $extension_image = strtolower($image_traiter->getClientOriginalExtension());
            $image_name = hexdec(uniqid());
            $full_image = $image_name . '.' . $extension_image;

            $image_scktoge = "images/images_students/";
            $db_image = $image_scktoge . $full_image;

            $image_traiter->move($image_scktoge, $full_image);
            unlink($image_ancien);

            Student::find($id)->update([

                'name_student' => $request->name_student,
                'fisrt_name' => $request->fisrt_name,
                'kind' => $request->kind,
                'registration_number' => $request->registration_number,
                'image_url' => $db_image,
            ]);

            return redirect()->route('students.index')->with('Succces', 'the student modify successfully');
        } else {
            Student::find($id)->update([

                'name_student' => $request->name_student,
                'fisrt_name' => $request->fisrt_name,
                'kind' => $request->kind,
                'registration_number' => $request->registration_number,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('students.index')->with('Succes', 'the student modify successfully');
        }

        return redirect()->route('students.index')->with('Succes', 'the student modify successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        unlink($student->image_url);

        $student->delete();

        return redirect()->route('students.index')->with('Succes', 'the student successfully deleted');
    }

    // public function deleteStudent($id)
    // {
    //     $studentdelete = Student::find($id);
    //     $studentdelete->delete();

    //     return redirect()->route('students.index')->with('Succes', 'the student successfully deleted');
    // }


    public function recycleStudent($id){

       // return 'JULIA';
      $student = Student::find($id);
      $student->delete();

      return back()->with('Success', 'Student send to trahs successfully');

    }

}
