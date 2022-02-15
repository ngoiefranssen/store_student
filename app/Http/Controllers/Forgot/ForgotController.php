<?php

namespace App\Http\Controllers\Forgot;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
{
    public function index()
    {
        return view('forgot_password.forgot_password');
    }

    public function updatepassword(Request $request)
    {
        // $passwords_valitaded =$request->validate([

        //     'old_password' => 'required',
        //     'password' => 'required|confirmed',
        // ],

        // [
        //     'old_password.required' => 'Please enter the old password!',
        //     'password.required' => 'The two passwords must match',
        // ]);

       // dd(Auth::user()->password);
       $input_password = request('actual_password');

        $user_connected_passsword = Auth::user()->password;

        if(Hash::check($input_password, $user_connected_passsword)){

            $datas =$request->validate([

                'password' => 'required|confirmed',
            ]);

            $user = User::find(Auth::id());

            $user->password = Hash::make($request->password);

            $user->save();

            return redirect()->route('login')->with('success', 'Password updated successfully');

        }else {

            return back()->with('message', 'The old password is not correct');


        }

/*
        if(Hash($request->old_password, $user_password))
        {
            $user_find = User::find(Auth::id());

            $user_find->password = Hash::make($request->password);

            $user_find->save();

           return redirect()->route('login')->with('success', 'Password updated successfully');
        }



        else
            return back()->with('status', 'Please, the current password is not correct !');*/
}
}
