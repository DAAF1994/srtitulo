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
                            <div class="form-group col-md-3">
                                <th><IMG SRC="http://files.macapiink.webnode.es/system_preview_detail_200000003-71add72a66-public/LOGO-UTEM.jpg" WIDTH=178 HEIGHT=180 ALT="Logo UTEM"></th>
                            </div>
                            <div class="form-group col-md-7">
                                </br>
                                <th>Alumno: David Alexis Acuña Fernández</th></br>
                                <th>Profesor: Santiago Zapata Caceres</th></br>
                                <th>Carrera: Ingeniería en Informática</th></br>
                                <th>Año: 2017</th></br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <a href="{{asset('nuevopost')}}" role="button" class="btn btn-success">Nuevo juego</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <a href="/prueba/{{Auth::id()}}" role="button" class="btn btn-success">Recomendación por comunidad</a>
                            </div>
                            <div class="form-group col-md-6">
                                <a href="/recomendacionesprovisorias/{{Auth::id()}}" class="btn btn-success">Recomendación por Género</a>
                            </div>
                        </div>

                        
                        </br>
                        @if (count($games) == 0)
                            <label> Aún no hay juegos en el sistema</label>
                        @else
                            <div class="row form-group">
                                <div class="col-md-12">
                                <input type="text" class="form-control" id="search" placeholder="Escribe para buscar..." class="form-control" />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12"> 
                                <table class="table table-bordered table-hover" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Nombre</th>
                                            <th>Año</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($games as $key => $game)
                                        <tr>
                                        <td><IMG width="100px" height="100px" SRC={{$game->image}} ></td>
                                            <td>{{ $game->title }}</td>       
                                            <td>{{ $game->year }}</td>  
                                            <td>
                                            <div class="form-group">
                                                <a class="btn btn-warning" href="{{ URL::to('/editar/'. $game->id ) }}">Editar</a>
                                                <a class="btn btn-success" href="{{ URL::to('/valorar/'. $game->id ) }}">Valorar</a>
                                                {{-- <form name="delete" method="post" action="eliminar">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id_juego" value="{{ $game->id }}">
                                                    <button class = "btn btn-danger" type="submit">Eliminar</button>
                                                </form> --}}
                                            </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keyup(function(){
        _this = this;
        // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
        $.each($("#tabla tbody tr"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
            else
               $(this).show();                
        });
    }); 
  });
  
</script>

@endsection
