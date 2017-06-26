<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function reset(Request $request)
    {
        $email = $request->email;
        $token = $request->reset_token;
        $user = User::where('email', $email)->first();
        if($token == $user->reset_token) {
            dd('可改密碼');
        }

        dd($email.$token);
    }
}
