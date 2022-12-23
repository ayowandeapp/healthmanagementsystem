<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   

    public function showLoginForm(Request $request)
    {
        //return view('admin.auth.login');
        echo 'login'; die;
    }
    
    public function login(Request $request)
    {
        echo $request->email; die;
        $data = $request->validate([
            'email'=>'required|email',
            'password'=>'required']);
        if(Auth::guard('admin')->attempt([
            'email'=> $data['email'],
            'password'=>$data['password']],
            $request->get('remember'))) {
            //return redirect('/admin/dashboard');
            return redirect('/home');
        }
        return back()->withInput($request->only('email','remember'));
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin');

    }

}
