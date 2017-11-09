@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Ingrese un nuevo juego</b></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                    <form  action="agregar" method="post" class="horizontal-form">

            
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 margenes">
                                    <label >Título</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="col-md-6 margenes" >
                                    <label >Año publicación</label>
                                    <input type="text" name="year" class="form-control">
                                </div>
                                <div class="col-md-12 margenes">
                                    <label >Trama</label>
                                    <textarea name="plot" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 margenes">
                                    <label >Desarrollador</label>
                                    <input type="text" name="developer" class="form-control">
                                </div>
                            </div>
                            </br>
                            <div class="col-md-12">
                                <select id="multiselect-genre" name="genre[]" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-12 text-center">
                            <br>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                           

                        </div> 
                             
                                
                      </form>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
                <link type="text/css" rel="stylesheet" href="css/bootstrap-multiselect.css"/>

                     <script>
                        $(document).ready(function() {
                            $('#multiselect-genre').multiselect();
                        });
                    </script>
            </div>
        </div>
    </div>
</div>

@endsection
