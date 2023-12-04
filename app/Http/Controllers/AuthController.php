<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage () {
        return view('auth.login');
    }

    public function registerPage () {
        return view('auth.register');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->role_id == 3){
                return redirect()->route('dashboard.user');
            }else{
                return redirect()->back()->with('error', 'You are not authorized to access this page.');
            }
        }else{
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function show () {
        return view('auth.register', [
            'roles' => Role::all()
        ]);
    }

    public function registerProcess (Request $request) {
        $validateData = $request->validate([
            'username' => 'required|string|min:8|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect()->route('login.page')->with('success', 'Registration Successful. Please login to continue.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.page');
    }
}
