<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LogoutController extends Controller
{
    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    public function logout()
    {
        if (Auth::user()) {
            Auth::logout();
        }

        return redirect($this->redirectTo);
    }
}
