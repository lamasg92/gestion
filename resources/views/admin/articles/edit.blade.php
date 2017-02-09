@extends('app')

@section('content')

    <div class="panel-heading">Edicion Articulo</div>
    <div class="panel-body">

        {!! Form::model($article, ['method' => 'PUT', 'route' => ['articles.update', $article]]) !!}

         @include('partials.articlesFieldsCreate')

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-adjust"></i>Actualizar</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection
