<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordRequest;
use App\Auth\User;
use App\Auth\ResetPasswordNotify;
use Hash;

class ResetPasswordController extends Controller
{
    public function sendResetMail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json(['message' => '查無此信箱'], 422);
        }

        $user->resetPassword();
        $user->notify(new ResetPasswordNotify($user));

        return response()->json(['message' => '重設密碼信已寄出']);
    }

    public function resetForm(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $email = $user->email;

        if(!($request->reset_token == $user->reset_token) || !$user->reset_token) {
            return response()->json(['message' => 'token mismatch...'], 403);
        }

        return view('auth.passwords.reset', compact('email'));
    }

    public function reset(PasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->reset_token = null;
        $user->save();

        return response()->json(['message' => 'success', 'redirectTo' => '/login']);
    }
}
