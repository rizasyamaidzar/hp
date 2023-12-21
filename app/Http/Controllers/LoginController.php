<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("dashboard");
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // Replace 'YourUserModel' with your actual User model class
        $user = User::where('email', $credentials['email'])
            ->where('password', $credentials['password'])
            ->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginErorr', 'Login Failed');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
