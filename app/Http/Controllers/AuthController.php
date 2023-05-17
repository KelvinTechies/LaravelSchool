<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\forgotpwdmail;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->User_type == 1) {
                return redirect('admin-dashboard');

            } elseif (Auth::user()->User_type == 2) {
                return redirect('teacher-dashboard');

            } elseif (Auth::user()->User_type == 3) {
                return redirect('student-dashboard');

            } elseif (Auth::user()->User_type == 4) {
                return redirect('parent-dashboard');

            }

        }
        return view('Auth.Login');
    }
    public function register()
    {
        return view('Auth.register');
    }

    public function Authlogin(Request $request)
    {

        $remember = (!empty($request->remember ? true : false));
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pwd], $remember)) {

            if (Auth::user()->User_type == 1) {
                return redirect('admin/dashboard');

            } elseif (Auth::user()->User_type == 2) {
                return redirect('Teachers/dashboard');

            } elseif (Auth::user()->User_type == 3) {
                return redirect('Students/dashboard');

            } elseif (Auth::user()->User_type == 4) {
                return redirect('Parents/dashboard');

            }
        } else {
            return back()->with('error', 'Please Enter Correct Email and Password');
        }


    }


    
    public function forgetpwd()
    {
        return view('auth.forget');
    }

    public function Postforgetpwd(Request $request){
        $userMail = User::getEmailSingle($request->email);
        // dd($userMail);
        $userMail->remember_token = Str::random(50);
        $userMail->save();

        if(!empty($userMail)){
            Mail::to($userMail->email)->send(new forgotpwdmail($userMail));
            return redirect()->back()->with('success', 'Check Your E-mail to Reset your Password');
            
        }else{
            return redirect()->back()->with('error', 'Email not Found');
        }
    }


    public function reset($remember_token)
    {
        $userMail = User::getTokenSingle($remember_token);
        $data['user'] = $userMail;
        if (!empty($userMail)) {
           return view('auth.reset', $data);
        }else {
            abort(404);
        }
    
    }


    public function PostReset($token, Request $request){
        if ($request->password == $request->cpassword) {
        $userMail = User::getTokenSingle($token);
        $userMail->password = Hash::make($request->password);
        $userMail->remember_token = Str::random(10);
        $userMail->save();
        return redirect('/login')->with('success', 'Password Changed Successfully');          
        }else {
            return redirect()->back()->with('error', 'Password Mix-matched');            
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect(url('/login'));
    }
}
