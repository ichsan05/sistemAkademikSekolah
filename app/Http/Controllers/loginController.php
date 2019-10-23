<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\user;

class loginController extends Controller
{
    public function index()
    {
    	return view('login');
    }

    public function checkLogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/admin');
        }
        else{
            return back()->with('error',"Email atau Password Salah");
        }
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function _postSignup(Request $request)
    {

        $this->validate($request,[
            'username' => "required|min:5|unique:users,name",
            'email' => "required|email|unique:users,email",
            'password' =>"required|min:6"
        ]);

        $insert = User::insert([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'remember_token' => str_random(30),
        ]);

        if ($insert) {
            return redirect('/logins')->with('success','Berhasil Mendaftar Silahkan Login');
        }
        else{
            return back()->with('error','gagal Mendaftar');
        }
    }
}
