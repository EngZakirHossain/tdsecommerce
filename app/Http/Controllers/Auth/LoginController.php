<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email'=> 'bail|required|string',
            'password'=>'bail|required|min:4'
        ]);
        //make  a credentials array
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        ///login attapt if success then redirect home
        //Try with email AND username fields
        if (Auth::attempt($credentials,$request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }
        //return error
        return back()->withErrors([
            'email' => 'Wrong Credentials Found !'
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
