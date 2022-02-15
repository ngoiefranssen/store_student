<?php

namespace App\Http\Controllers\Backend;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::get();
        $levels = Level::paginate(6);
        return view('levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = $request->validate([

            'name_level' => 'required|max:50',
        ],
        [
            'name_level.required' => 'modifier ou enregistrer vos informations precedente',
        ]);


        Level::create($level);
        return redirect()->route('levels.index')->with('Succes', 'level create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return view('levels.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::find($id);
        return view('levels.edit', compact('level'));
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
        $level = $request->validate([

            'name_level' => 'required|max:50',
        ],
        [
            'name_level.required' => 'modifier ou enregistrer vos informations precedente',
        ]);

        Level::find($id)->update([

            'name_level' => $request->name_level,
        ]);

        return redirect()->route('levels.index')->with('Succes', 'level modify successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        $level->delete();

        return back()->with('Succes', 'level deleted successfully');
    }

    public function deleteLevel($id)
    {
        $level = Level::find($id);
        // dd($level);
        // $level->delete();
        if($level != null)
            $level->delete();

        return back()->with('Succes', 'level deleted successfully');
    }
}
