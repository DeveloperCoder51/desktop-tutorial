<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function dashboard(){
        return view('web.home');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login_view')->with('success','LogOut Successfully');
    }
}