@extends('app')

@section('content')

       <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div id=panel-tittle class="panel-heading">Clientes</div>
                    <div class="panel-body">

                        <a href="{{route('clients.create')}}" class="btn btn-info">
                            <i class="glyphicon glyphicon-new-window"></i>
                            Nueva
                        </a>


                        <table class="table table-striped">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Accion</th>
                                </thead>
                                <tbody>
                                    @include('partials.clientsList');
                                </tbody>
                            </table>
                            {{--Allow pagination--}}
                            {{$clients->render()}}
                    </div>
                </div>
            </div>
        </div>

@endsection
