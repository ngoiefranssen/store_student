<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
