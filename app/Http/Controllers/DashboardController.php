<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Hash;
class DashboardController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function profile() {
        return view('admin.profile');
    }

    public function profileUpdate(Request $request) {
        //validate the request
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required',
            'user_type' => 'required'
        ]);
        if ($validator->fails()) { 
            return back()->withInput()->withErrors($validator->errors());  
        }

        $admin = Auth::user();
        $admin->update($request->all());
        return redirect()->route('admin.profile')->with('success','Profile updated successfully!');
    }

    public function profileUpdatePassword(Request $request) {
        //validate the request
        $validator = Validator::make($request->all(), [ 
            'oldpassword' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        if ($validator->fails()) { 
            return back()->withInput()->withErrors($validator->errors());  
        }

        if(Hash::check($request->oldpassword,Auth::User()->password)) {
            $admin = Auth::user();
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()
                ->route('admin.profile')
                ->with('success','New Password updated successfully!');
        }
        else {
            return redirect()
                ->back()
                ->with('error','Old password does not match!');
        }

        
    
    }
}
