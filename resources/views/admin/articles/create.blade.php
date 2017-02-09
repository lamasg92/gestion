@extends('app')

@section('content')

    <div class="panel-heading">Articulos</div>
    <div class="panel-body">

        {!! Form::open(['method' => 'POST', 'route' => 'articles.store']) !!}

          @include('partials.articlesFields')

          <div class="form-group">

            <div class="col-md-6 col-md-offset-4">
               <button type="submit" class="btn btn-primary">Crear</button>
            </div>

          </div>

        {!! Form::close() !!}

    </div>

@endsection
