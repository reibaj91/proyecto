<?php

namespace App\Http\Controllers;

use App\Aplicaciones;
use App\PerfilApp;
use App\Perfiles;
use App\ProfesoresPerfiles;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

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
//    Nos saca la vista del login
    public function index()
    {
        $user = User::all();
        if ($user == null) {
            return view ('admin.createAdmin');
        } else {
            $aplicaciones= PerfilApp::aplicacionesUsuario()->with('aplicaciones')->get();
//            dd($aplicaciones);
            return view('home',['aplicaciones'=>$aplicaciones]);
        }
    }

    public function logout(){
        \Auth::logout();
        return view('auth.login');
    }
}
