<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeniedController extends Controller
{
    public function denied()
    {
        return view('auth.denied');
    }
}
