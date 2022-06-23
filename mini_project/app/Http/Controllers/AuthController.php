<?php

namespace App\Http\Controllers;

use App\Repositories\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('front.login');
    }
    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'email'=>'required|email',
            'password'=>'min:6|required'
        ]);

        if ($validator->fails()){
            $message = $validator->errors()->all();
            return redirect()->back()->with('danger', implode(',',$message));
        }
        $customers = Customers::findBy('email',$request->email);
        if($customers->id == null){
            return redirect()->back()->with('danger','Customer not found');
        }
        if(!Hash::check($request->password,$customers->password)){
            return redirect()->back()->with('danger', 'Wrong Password');
        }
        storeCustSession($customers);
        return redirect('/')->with('success', 'Welcome back! ' .$customers->name);
    }

    public function postLogout(Request $request)
    {
        session()->forget('customers');
        return redirect('login')->with(['success' => 'Success Logout']);
    }
    }

