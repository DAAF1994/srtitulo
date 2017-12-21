@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>
                    <div class="panel-body">
                        <table id="task" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Task</th>
                                <th>Category</th>
                                <th>State</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    var $ = jQuery;
     $(document).ready(function() {
      
       $('#task').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.tasks') }}",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'title', name: 'titulo'},
                {data: 'year', name: 'año'},
                {data: 'image', name: 'juego'}
            ]
        });
    });
</script>

@endsection


