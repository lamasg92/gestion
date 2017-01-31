@extends('app')

@section('content')

    <div class="panel-heading">Edicion Cliente</div>
    <div class="panel-body">

        {!! Form::model($client, ['method' => 'PUT', 'route' => ['clients.update', $client]]) !!}

            {{--@include('partials.clientFields')--}}

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-adjust"></i>Actualizar</button>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection
