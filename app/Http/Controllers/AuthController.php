<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    function registerPage()
    {
        return view('auth.register');
    }

    function registerUser(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required',  Rules\Password::defaults()],
        ]);
            

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


      return redirect('/login');

    }

    function loginPage()
    {
        return view('auth.login');
    }

    function loginUser(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if (Auth::attempt($credentials,100)) {
            $request->session()->regenerate();
 
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');


    }

    function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();   
        return redirect('/login');

    }
}
