@extends('app')

@section('content')
    <div class="panel-heading">Facturacion</div>
    <div class="panel-body">


        {!! Form::open(['route' => 'articles.index', 'method'=>'GET', 'class'=>'navbar-form navbar-right pull-left', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre Articulo']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}


        {!! Form::open(['route' => 'categories.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre Ctegoria']) !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}

        {!! Form::open(['method' => 'POST', 'route' => 'invoice.store']) !!}


        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Grabar</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>


@endsection