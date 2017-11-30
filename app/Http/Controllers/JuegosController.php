<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Juego;
use App\User;
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
		return view('view')->with("post",$post)->with("comentarios",$comentarios);
	}


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

	public function buscarjuego(Request $request){
		$game = Juego::where('title','=',$request->input('gamename'))->first();
		$gameid = $game->id;
		return redirect()->action(
    	'JuegosController@getGame', ['id' => $gameid]
		);
		
	}


	public function valorar(Request $request){
		
		//Obtener id del usuario activo
		$userid = Auth::id();
		//Hacer valoración para el juego
		$valoracion = new valoracion();
		$valoracion->games_id = $request->input('gameid');
		$valoracion->rate = $request->input('rate');
		$valoracion->users_id = $userid;
		$valoracion->save();

		return redirect('/');
	}

	protected static function rateSum($usersgame){
		$sum = 0;
		foreach ($usersgame as $key => $value) {
			$sum = $sum + $value->rate;
		}
		return $sum;
	}


	public function recomendar_juegos($id){
		$usuarios = User::where('id','!=',$id)->get();
		$games = Juego::all();
		$usersgame = valoracion::where('users_id','=',$id)->select('rate')->get();
		$a = $this->rateSum($usersgame);
		//Notas promedio del usuario activo
		$avgActiveUser = $this->rateSum($usersgame)/count($usersgame);
		
		$corr_array = [];
		foreach ($usuarios as $user) {
			$buserGames = valoracion::where('users_id','=',$user->id)->select('rate')->get();
			//Obtener las notas promedio
			$avguser = $this->rateSum($buserGames)/count($buserGames);
			$numerator = 0;
			$denominatorA = 0;
			$denominatorB = 0;
			foreach($games as $game){
				$id_game = $game->id;
				//Obtener las valoraciones del usuario activo para el juego actual analizado
				$rate_user = valoracion::where('users_id','=',$id)->where('games_id','=',$id_game)->select('rate')->first();
				//Obtener las valoraciones del usuario de la población para el juego actual analizado
				$rate = valoracion::where('users_id','=',$user->id)->where('games_id','=',$id_game)->select('rate')->first();
				
				//Calcular la correlación de pearson
				if(!empty($rate_user) && !empty($rate)){
				   $raj = $rate_user->rate - $avgActiveUser;
				   $rbj = $rate->rate - $avguser;
				   $numerator = $numerator + ($raj * $rbj);
				   $denominatorA = $denominatorA + pow($raj,2);
				   $denominatorB = $denominatorB + pow($rbj,2);
				}
			}
			//Guardar las correlaciones en un arreglo asociativo   id_usuario => correlacion
			$corr_array[$user->id] = $numerator / sqrt($denominatorA * $denominatorB);
		}
		//Ordenar recomendaciones por valores más cercanos al 1
		arsort($corr_array);
		$recomendaciones = [];
		$counter = 1;
		//Función para hacer recomendaciones, 
		foreach ($corr_array as $userid => $corr) {
			if ($counter <=5){
				$games1 = valoracion::where('users_id','=',$userid)->pluck('games_id')->toArray();
				$gamesActiveUser = valoracion::where('users_id','=',$id)->pluck('games_id')->toArray();
				//Obtener ids de juegos diferentes
				$diffgames = array_diff($games1, $gamesActiveUser);
				//Si existen juegos que se puedan recomendar al usuario activo
				if(count($diffgames)>0){
					foreach ($diffgames as $key => $value) {
						$recomendaciones[] = $value;
					}
				}
				$counter++;
			}else{
				break;
			}
		}
		
		$juegos_recomendados = Juego::find($recomendaciones);
		return view('ver_recomendaciones')->with('juegos_recomendados', $juegos_recomendados);
	}

}
