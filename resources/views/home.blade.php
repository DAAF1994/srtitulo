@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

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
                            <label> Aun no hay juegos en el sistema</label>
                        @else
                            <div class="row">
                                @foreach ($games as $game)
                                <div class="col-md-12">
                                   
                                        <p>Título: {{ $game->title }}</p>
                                        <p>Año publicación: {{ $game->year }}</p>
                                        <p>Género: {{ $game->genre }}</p>
                                        <p>Trama: {{ $game->plot }}</p>
                                    
                                </div>


                                <div class="col-md-6 text-right">
                                    <a href="game/{{$game->id}}" class="text-right">comentar</a>
                                </div>
                                @endforeach
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
@endsection
