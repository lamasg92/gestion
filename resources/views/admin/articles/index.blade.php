@extends('app')

@section('content')

    <div id=panel-tittle class="panel-heading">Articulos</div>
    <div class="panel-body">

        <a href="{{route('articles.create')}}" class="btn btn-info">
            <i class="glyphicon glyphicon-new-window"></i>
            Nueva
        </a>

        {!! Form::open(['route' => 'articles.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre articulo']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}


        <table class="table table-striped">
                <thead>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Stock</th>
                    <th>Categoria</th>
                    <th>Precio Unitario</th>
                    <th>Accion</th>
                </thead>
                <tbody>
                    @include('partials.articlesList');
                </tbody>
            </table>
            {{--Allow pagination--}}
            {{$articles->render()}}
    </div>

@endsection
