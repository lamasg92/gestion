@extends('app')

@section('content')
    <div id=panel-tittle class="panel-heading">Usuarios</div>
    <div class="panel-body">

      {!! Form::open(['route' => 'users.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre User']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Username</th>
                    <th>Role</th>
                </thead>
                <tbody>
                    @include('partials.usersList');
                </tbody>
            </table>
            {{--Allow pagination--}}
            {{$users->render()}}
    </div>

@endsection
