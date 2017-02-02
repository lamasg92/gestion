@extends('app')

@section('content')

    <div id=panel-tittle class="panel-heading">Clientes</div>
    <div class="panel-body">

        <a href="{{route('clients.create')}}" class="btn btn-info">
            <i class="glyphicon glyphicon-new-window"></i>
            Nuevo
        </a>


        {!! Form::open(['route' => 'clients.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
        <div class="form-group">
            {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre Cliente']) !!}
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}


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

@endsection
