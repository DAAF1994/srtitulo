@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mi Cuenta</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                        </div>
                            <div class="row">

                                <div class="col-md-6" style="margin-left:15px">
                                    <p>Nombre de usuario: {{ Auth::user()->name  }}</p>
                                </div>
                                <div class="col-md-6" style="margin-left:15px">
                                    <p>Email: {{ Auth::user()->email  }}</p>
                                </div>  
                                
                        </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap-multiselect.js')}}"></script>
@endsection
