@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Juegos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{asset('nuevopost')}}" class="btn btn-success">Nuevo juego</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="/prueba/{{Auth::id()}}" class="btn btn-success">Ver recomendaciones</a>
                            </div>
                        </div>
                        </br>
                        @if (count($games) == 0)
                            <label> Aún no hay juegos en el sistema</label>
                        @else
                            <div class="row">
                                <form action="/buscarjuego" method="POST" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="gamename"
                                            placeholder="Buscar Juegos"> <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>

                            </br>
                            <table class="tabladavid">
                                @foreach ($games as $game)
                    
                                              <tr>
                                                <th>Título</th>
                                                <td> {{ $game->title }} </td>
                                              </tr>
                                              <tr>
                                                <th>Imagen</th>
                                                <td><IMG SRC={{$game->image}}} ></td>
                                              </tr>
                                              <tr>
                                                <th>Año de publicación</th>
                                                <td> {{$game->year}} </td>
                                              </tr>
                                              <tr>
                                                <th>Descripción</th>
                                                <td> {{ $game->plot }}</td>
                                              </tr>
                                              <tr>
                                                <th>Géneros</th>
                                                <td>
                                                    @foreach($game->getGenreGames as $genre)
                                                      {{$genre->getGenre->name}},
                                                    @endforeach
                                                </td>
                                              </tr>
                                                <tr>
                                                    <th>Desarrollador</th>
                                                    <td> {{ $game->developer }}</td>
                                                </tr>
                                                
                                               <tr>
                                                  <th>Plataformas</th>
                                                  <td>
                                                    @foreach($game->getPlatformGame as $platform)
                                                      {{$platform->getPlatform->name}},
                                                    @endforeach
                                                  </td>
                                                </tr>
                                                
                                @endforeach
                                </table>
                            </div>

                        
                        @endif
                            
                  
                </div>
            </div>
        </div>
    </div>
    <a href='https://www.freepik.com/free-vector/joystick-vector-seamless_1389671.htm'>Designed by Freepik</a>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap-multiselect.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endsection
