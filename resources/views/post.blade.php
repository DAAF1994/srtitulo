@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingrese Un Nuevo Juego</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                    <form  action="agregar" method="post" class="horizontal-form">

              
                        <div class="row">
                        

                            <div class="col-md-12">
                                <label >Titulo</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="col-md-12">
                                <label >Año publicación</label>
                                <textarea name="year" class="form-control"></textarea>
                            </div>
                            </br>
                            <div class="col-md-12">
                                <select id="example-getting-started" multiple="multiple">
                                    <option value="cheese">Cheese</option>
                                    <option value="tomatoes">Tomatoes</option>
                                    <option value="mozarella">Mozzarella</option>
                                    <option value="mushrooms">Mushrooms</option>
                                    <option value="pepperoni">Pepperoni</option>
                                    <option value="onions">Onions</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label >Trama</label>
                                <textarea name="plot" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label >Desarrollador</label>
                                <textarea name="developer" class="form-control"></textarea>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-12 text-center">
                            <br>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                            
                                
                        </div>

                    </form>
                </div>

                     <script>
                         $(function() {

                            $('#chkveg').multiselect({

                                        includeSelectAllOption: true

                                        });

                                        $('#btnget').click(function() {

                                        alert($('#chkveg').val());

                                        })

                                        });
                    </script>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap-multiselect.js')}}"></script>
@endsection
