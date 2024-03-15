<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

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
    
}
