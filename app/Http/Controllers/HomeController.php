<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juego;
use App\GenreGame;
use App\genre;
use App\Platform;
use App\PlatformGame;


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
        $genregames = GenreGame::all();
        $genre = genre::all();
        $platform = Platform::all();
        $platformgames = PlatformGame::all();
        return view('home')->with("games",$games)->with("genregames",$genregames)->with("genero",$genre)->with("platformgames",$platformgames)->with("plataforma",$platform);

    }
}