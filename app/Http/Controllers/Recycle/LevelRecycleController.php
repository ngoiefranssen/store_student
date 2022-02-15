<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelRecycleController extends Controller
{
    public function index()
    {
        $levelRecycles = Level::onlyTrashed()->get();
        return view('recycle.recycle_level.recycle_level', compact('levelRecycles'));
    }

    public function restoreLevel($id)
    {
        $restorelevel = Level::withTrashed()->find($id);
        $restorelevel->restore();

        return back()->with('Succes', 'level restore successfully');
    }

    public function deleteFinalLevel($id)
    {
        $finalDeleteLevel = Level::onlyTrashed()->find($id);
        $finalDeleteLevel->forceDelete();
        // dd($finalDeleteLevel);
        return back()->with('Succes', 'level deleted successfully');
    }
}
