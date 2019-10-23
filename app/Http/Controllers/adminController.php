<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class adminController extends Controller
{
   public function index()
   {
   	return view('admin/dashboard');
   }

   public function logout()
   {
      Auth::logout();
      return redirect('/logins');
   }
   public function changePassword()
   {
   	 return view('admin/changePassword');
   }
   public function postChangePassword(Request $request)
   {

   		//check Password Lama
   		if (!(Hash::check($request->old_pass, Auth::user()->password))) {
   			return back()->with('error','Password Salah');
   		}


		//Validasi Password    	
		$this->validate($request,[
				'new_pass' => 'required',
				'con_new_pass' => 'required|same:new_pass',
			],
				$error_message = [
				'same' => "Konfirmasi password Gagal"
			]
		);

		User::where(['id'=> auth()->user()->id])->update([
			'password' => bcrypt($request->con_new_pass),
		]);
		return redirect('/admin');
   }
}
