<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (\auth()->user()) {
            return 1;
        }
        $user = User::query()->where('email', $request->get('email'))->first();
        if ($user && $request->get('password')) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
            }
        }
        return Auth::check($user);
    }
}
