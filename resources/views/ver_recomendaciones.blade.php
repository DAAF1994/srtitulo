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
                            <h3>Recomendaciones de Juegos</h3>

                        </div>
                        </br>
                     
                            <div class="row">
                            <table class="tabladavid">
                                @foreach ($juegos_recomendados as $game)
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
                                                      {{$genre->getGenre->name}}
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
                                                      {{$platform->getPlatform->name}}
                                                    @endforeach
                                                  </td>
                                                </tr>
                                @endforeach
                                </table>
                            </div>
      
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap-multiselect.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endsection
