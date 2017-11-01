<?php

namespace NotgameSuggestions\Http\Controllers;

use Illuminate\Http\Request;
use NotgameSuggestions\user;

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
    public function getView()
    {

        $users = user::all();
        return view('usuario')->with("users",$users);
    }
}