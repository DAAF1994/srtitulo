<?php

namespace NotgameSuggestions\Http\Controllers;

use Illuminate\Http\Request;
use NotgameSuggestions\Juego;

class JuegosController extends Controller
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
        $posts = Juego::all();
        return view('post')->with("posts",$posts);
    }

    public function addGame(Request $request) //agregar un nuevo post
    {

            dd($request);
            $juego = new Juego();
            $juego->title = $request->input("title"); // $juego->titulo = bob esponja
            $juego->year = $request->input("year");
            $juego->genre = $request->input("genre");
            $juego->plot = $request->input("plot");
            $juego->developer = $request->input("developer");
            $juego->save();

            $games = Juego::all();
            return view('home')->with("games",$games);

    }


    public function getView($id) //obtener la vista del post
    {

        $post = Post::find($id);
        $comentarios = Comentario::where("post_id",$id)->get();
        //dd($post->id);
       
        return view('view')->with("post",$post)->with("comentarios",$comentarios);
    }
}
