<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Juego;
use App\valoracion;
use App\genre;
use App\GenreGame;
use App\PlatformGame;


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
        $genres = genre::all();
        return view('post')->with("posts",$posts)->with("genres",$genres);
    }

    public function addGame(Request $request) //agregar un nuevo post
    {

            //dd($request);
            $juego = new Juego();
            $juego->title = $request->input("title"); // $juego->titulo = bob esponja
            $juego->year = $request->input("year");
            $juego->plot = $request->input("plot");
            $juego->developer = $request->input("developer");
            $juego->save();

            $genres = $request->input("genre");
            foreach($genres as $genre){       
                $gg = new GenreGame();
                $gg->games_id = $juego->id;
                $gg->genre_id = $genre;
                $gg->save();
            }

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

    public function postSearchGame($game){
        $genres = GenreGame::where('games_id','=',$game->id)->get();
        return view('verjuego')->with('genres',$genres);
    }

    /*public function getgame(Request $request){
        $game = Juego::where('title','=',$request->input('gamename'))->get();
        $game = $game[0];
        $genres = GenreGame::where('games_id','=',$game->id)->get();
        $genregames = GenreGame::all();
        $platformgames = PlatformGame::all();
        if ($game != NULL){
            return view('verjuego')->with('game',$game)->with('genres',$genres);
        }else{
            return view('error');
        }
    }*/

    public function getGame($id){
        $game = Juego::where('id','=',$id)->get();
         if ($game != NULL){
            $game = $game[0];
            $genres = GenreGame::where('games_id','=',$game->id)->get();
            $genregames = GenreGame::all();
            $platformgames = PlatformGame::all();
            return view('verjuego')->with('game',$game)->with('genres',$genres);
        }else{
            return view('error');
        }
        //dd($game);
    }


    public function valorar(Request $request){
        
        // Get the currently authenticated user's ID...
        $userid = Auth::id();
        //dd($request, $user, $id);
        $valoracion = new valoracion();
        $valoracion->games_id = $request->input('gameid');
        $valoracion->rate = $request->input('rate');
        $valoracion->users_id = $userid;
        $valoracion->save();

        return redirect('/');

        // $x = Usuario al que le quieres recomendar juegos
        // $y = Usario a comparar
        // guardar la correlacion en un diccionario  '2' => 0.87, '3' => 0.9

    }

    protected function pearsonCorrelation($x, $y){

        $length= count($x);
        $mean1=array_sum($x) / $length;
        $mean2=array_sum($y) / $length;

        $a=0;
        $b=0;
        $axb=0;
        $a2=0;
        $b2=0;

        for($i=0;$i<$length;$i++){
            $a=$x[$i]-$mean1;
            $b=$y[$i]-$mean2;
            $axb=$axb+($a*$b);
            $a2=$a2+ pow($a,2);
            $b2=$b2+ pow($b,2);
        }
        $corr= $axb / sqrt($a2*$b2);

    return $corr;
}
