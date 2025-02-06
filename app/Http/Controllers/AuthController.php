<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login() {
        return view('authentication.login');
    }

    public function authenticate(Request $request)
   {
       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);


       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
           return redirect('/')->with('success', 'Welcome ');
       }


       return back()->with('error', 'Login Failed');
   }



    public function register() {
        return view('authentication.register');
    }

    public function registerStore(Request $request) {
        $validated = $request->validate([
            'email' => 'email|required|unique:users',
            'name' => 'required',
            'whatsapp_number' => 'required',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
 
 
        $user =   User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);
 
 
        if (!$user) {
            return redirect('/auth/register')->with('error', 'Register Failed');
        }
 
 
        unset($validated['email']);
        unset($validated['password']);
 
        $validated['user_id'] = $user->id;
 
        $customer = Customer::create($validated);
 
        if ($customer) {
            return redirect('/auth/login')->with('success', 'Register Successfuly');
        } else {
 
 
            return redirect('/auth/register')->with('error', 'Register Failed ');
        }
 
 
    }

    public function logout(Request $request)
   {
       Auth::logout();

       $request->session()->invalidate();


       $request->session()->regenerateToken();


       return redirect('/auth/login');
   }

 
}
