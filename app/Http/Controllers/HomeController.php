<?php

namespace NotgameSuggestions\Http\Controllers;

use Illuminate\Http\Request;
use NotgameSuggestions\Juego;

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

        $games = Juego::all();
        return view('home')->with("games",$games);
    }
}
