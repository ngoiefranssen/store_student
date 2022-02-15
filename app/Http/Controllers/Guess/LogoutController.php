<?php

namespace App\Http\Controllers\Guess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect('login');

    }
}
