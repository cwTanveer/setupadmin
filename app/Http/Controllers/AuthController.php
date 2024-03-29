<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginPost(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($validate->fails()){
            return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
        }

        $rem = $request->remember ?? false;

        if(Auth::attempt(['email' => $request->email, 'password'=> $request->password],$rem)){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with("fail","Something Went Wrong!");
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function registerPost(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    
        if ($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log in the newly registered user
        if($user!=null){
            Auth::login($user);
            return redirect()->route('admin.dashboard')->with("success", "Registration successful! Welcome to our platform!");
        }

        return redirect()->back()->with('fail', 'Something Went Wrong!');
    }
    
}
