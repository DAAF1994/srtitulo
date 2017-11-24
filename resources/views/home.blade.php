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
                        </br>
                        @if (count($games) == 0)
                            <label> Aún no hay juegos en el sistema</label>
                        @else
                            <div class="row">
                        {{--
                        <div id="custom-search-input" action="/verjuego">
                            <div class="input-group col-md-12">
                                <input type="text" class=" search-query form-control" placeholder="Search" name="gamename"/>
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                        --}}

                                <form action="/verjuego" method="POST" role="search">
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
                                                    @foreach($genregames as $genre)
                                                    @if($genre->games_id == $game->id)
            
                                                        @foreach ($genero as $g)
                                                            @if($g->id == $genre->genre_id)
                                                                {{$g->name}},
                                                            @endif
                                                        @endforeach
                                                        
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <tr>
                                                <th>Desarrollador</th>
                                                <td> {{ $game->developer }}</td>
                                                </tr>
                                                <tr>
                                                <th>Plataformas</th>
                                                <td>
                                                    @foreach($platformgames as $platform)
                                                    @if($platform->games_id == $game->id)
            
                                                        @foreach ($plataforma as $p)
                                                            @if($p->id == $platform->platform_id)
                                                                {{$p->name}},
                                                            @endif
                                                        @endforeach
                                                        
                                                    @endif
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
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap-multiselect.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endsection
