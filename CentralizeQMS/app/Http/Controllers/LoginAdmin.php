<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use DB;
use Auth;

class LoginAdmin extends Controller
{
    public function loginPage(){
        return view('Home');
    }

    public function postLogin(Request $request){
        //redirect each user to each login home based on role. Admin = 0, employee = 1, Supervisor = 2
        if (Auth::guard('user')->attempt(['username' => $request->username,'password' => $request->password, 'role' => 0])) {
            return redirect('/adminPage');
        }else if(Auth::guard('user')->attempt(['username' => $request->username,'password' => $request->password, 'role' => 1])){
            return redirect('/EPage');
        }else if(Auth::guard('user')->attempt(['username' => $request->username,'password' => $request->password, 'role' => 2])){
            return redirect('/SupervisorPage');
        }
        return redirect('/');
    }

    //logout user
    public function logoutAdmin(){
        Auth::guard('user')->check();
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
