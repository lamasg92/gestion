@extends('app')

@section('content')
    <div class="panel-heading">Categorias</div>

    <div class="panel-body">

        {!! Form::open(['method' => 'POST', 'route' => 'categories.store']) !!}

            @include('partials.categoryFields')

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                   <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>

        {!! Form::close() !!}

    </div>

@endsection
