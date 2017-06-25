<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\User;
use Auth;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after register.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'success', 'redirectTo' => $this->redirectTo], 200);
    }
}
