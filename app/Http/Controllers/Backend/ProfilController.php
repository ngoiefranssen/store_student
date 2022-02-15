<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class ProfilController extends Controller
{
    public function forgetAttrib(Request $request)
    {
        $foreget = $request->validate([

            'name' => 'required',
            'email' => 'required',
        ],

        [
            'name.required' => 'Veillez completer le champ stp !',
            'email.required' => 'Veillez completer le champ stp !',
        ]
        );

        User::find(Auth::user()->id)->update([

            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('login');


    }
}
