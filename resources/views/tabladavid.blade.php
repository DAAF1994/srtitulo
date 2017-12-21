@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="alert alert-danger">
          <strong>Ohh!</strong> Usted no ha evaluado ningun juego aun
        </div>
            <div class="panel panel-success">
                <div class="panel-heading">Juegos</div>
                <table class="table table-bordered table-hover" id="tabla">
              
                <thead>
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Año</th>
                </tr>
                </thead>
            
                  @foreach ($juegos_paraevaluar as $key => $game)
                      <tr>
                        <td><IMG width="100px" height="100px" SRC={{$game->image}} ></td>
                          <td>{{ $game->title }}</td>       
                          <td>{{ $game->year }}</td>  
                          <td><button>hola</button></td>
                      </tr>
                    
                    @endforeach
                   
                  </table>
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
  $(document).ready(function(){
    $('#tabla').DataTable({

      "processing": true,
      "serverSide": true,
      
      "ajax": "{{ route('datatable.tasks') }}",
      "columns": [
         {
            "render": function (data, type, JsonResultRow, meta) {
              return '<img width="100px" height="100px" src="'+JsonResultRow.image+'">';
              
            }
          },
          {data: 'id', name: 'id'},
          {data: 'title', name: 'title'},
          {data: 'year', name: 'year'}
        
      ]
    });
  });
  
</script>


@endsection
