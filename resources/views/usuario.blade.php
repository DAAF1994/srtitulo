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


                           

                        </div>
                        </br>
                        
                            <div class="row">
                                @foreach ($users as $user)
                                <div class="col-md-12">
                                   
                                        <p>Nombre de usuario: {{ Auth::user()->name  }}</p>
                                        <p>email: {{ Auth::user()->email  }}</p>
                                    
                                </div>


                                <div class="col-md-6 text-right">
                                    <a href="user/{{$user->id}}" class="text-right">comentar</a>
                                </div>
                                @endforeach
                            </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
