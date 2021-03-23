<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use App\Admin;


class AdminAuth extends Controller
{
    public function login() {
        return view('admin.login');

    } // end of login

    public function dologin() {
        //check email and password
        $rememberme = request('rememberme') == 1 ? true: false; 
        if(admin()->attempt(['email'=>request('email'), 'password'=>request('password')],$rememberme))
        {
            return redirect('dashboard');
        }else{
            session()->flash('error',trans('admin.inccorrect_information_login'));
            return redirect('dashboard/login');
            //return redirect(aurl('login'));
        }

    } // end of dologin

    public function logout() {
        admin()->logout();
        return redirect('dashboard/login');

    } // end of logout


   
} // end of controller
