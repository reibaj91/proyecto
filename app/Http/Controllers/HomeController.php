<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        if ($user == null) {
            return view ('admin.createAdmin');
        } else {
            return view('home');
        }
    }

    public function logout(){
        \Auth::logout();
        return view('auth.login');
    }
}
