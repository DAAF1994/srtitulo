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
                            <h3>Evalue algunos juegos por favor</h3>

                        </div>
                        </br>
                     
                            <div class="row">
                            <form method="POST" action="/valorarjuego">
                                  {{ csrf_field() }} 
                            <table class="tabladavid">
                                @foreach ($juegos_paraevaluar as $key => $game)
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
                                                <tr>

                                                  <th>Valoración </th>
                                                  <td>
                                                        <div class="rate">
                                                          <input type="radio" id="star10" name="rate[{{$game->id}}]" value="10" />
                                                          <label for="star10" title="text">10 stars</label>
                                                          <input type="radio" id="star9" name="rate[{{$game->id}}]" value="9" />
                                                          <label for="star9" title="text">9 stars</label>
                                                          <input type="radio" id="star8" name="rate[{{$game->id}}]" value="8" />
                                                          <label for="star8" title="text">8 stars</label>
                                                          <input type="radio" id="star7" name="rate[{{$game->id}}]" value="7" />
                                                          <label for="star7" title="text">7 stars</label>
                                                          <input type="radio" id="star6" name="rate[{{$game->id}}]" value="6" />
                                                          <label for="star6" title="text">6 stars</label>
                                                          <input type="radio" id="star5" name="rate[{{$game->id}}]" value="5" />
                                                          <label for="star5" title="text">5 stars</label>
                                                          <input type="radio" id="star4" name="rate[{{$game->id}}]" value="4" />
                                                          <label for="star4" title="text">4 stars</label>
                                                          <input type="radio" id="star3" name="rate[{{$game->id}}]" value="3" />
                                                          <label for="star3" title="text">3 stars</label>
                                                          <input type="radio" id="star2" name="rate[{{$game->id}}]" value="2" />
                                                          <label for="star2" title="text">2 stars</label>
                                                          <input type="radio" id="star1" name="rate[{{$game->id}}]" value="1" />
                                                          <label for="star1" title="text">1 star</label>
                                                        </div>
                                                        <input type="hidden" name="gameid[]" value="{{$game->id}}">
                                                  </td>
                                                </tr>
                                @endforeach
                                </table>
                                <div class="row">
                                              <div class="col-md-12">
                                                <button type="submit" class="btn btn-success">Valorar Juegos</button>
                                              </div>
                                                  </div>
                              </form>
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

<script type="text/javascript">
  
</script>


@endsection
