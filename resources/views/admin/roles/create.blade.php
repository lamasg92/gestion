@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Rol</div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST', 'route' => 'roles.store']) !!}


                        {!! Field::text('Rol') !!}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <button type="button" class="btn btn-default">Cancelar</button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

@endsection
