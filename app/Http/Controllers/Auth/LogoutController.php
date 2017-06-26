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
    protected $redirectTo = '/';

    public function logout()
    {
        Auth::logout();

        return redirect($this->redirectTo);
    }
}
