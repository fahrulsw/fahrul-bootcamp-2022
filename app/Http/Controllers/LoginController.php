<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function redirect;
use function session;
use function view;

class LoginController extends Controller
{
    public function getIndex() {
        if (session()->get('admin_id')) {
            return redirect('admin');
        }
        return view('backend.login');
    }
    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $check = DB::table('admins')->where('email',$email)->first();

        if ($check) {
            if (Hash::check($password,$check->password)) {
                session()->put('admin_id',$check->id);
                session()->put('admin_name',$check->name);
                session()->put('admin_email',$check->email);
                session()->put('admin_photo',$check->photo);

                return redirect('admin')->with(["message"=>"Success Login"]);
            }else{
                return redirect()->back()->with(["message"=>"Password Tidak ditemukan"]);
            }
        }else{
            return redirect()->back()->with(["message"=>"Email Tidak ditemukan"]);
        }
    }

    public function getLogout() {
        session()->flush();
        return redirect('admin/login')->with(["message"=>"Terimakasih"]);
    }
}
