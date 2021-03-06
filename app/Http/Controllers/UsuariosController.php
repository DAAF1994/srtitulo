<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

class UsuariosController extends Controller
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

        $user = auth()->user();
        return view('usuario')->with("user",$user);
    }
}