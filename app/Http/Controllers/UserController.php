<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // REGISTER USER =====================================================
    public function register(Request $req)
    
    {
        $incomingFields = $req->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        auth()->login($user);

        return redirect('/');
    }

    // LOGOUT USER ========================================================
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    // LOGIN USER =========================================================
    public function login(Request $req)
    {
        $incomingFields = $req->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {   
            $req->session()->regenerate();
        }
        return redirect('/');
    }
}
