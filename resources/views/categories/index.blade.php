@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categorias</div>
                    <div class="panel-body">

                        <ul>
                            @foreach($categories as $category)
                                <li>
                                    {{$category->nombre }}
                                </li>
                             @endforeach
                        </ul>
                        {{--{!! Form::open(['method' => 'POST', 'route' => 'categories.store']) !!}--}}

                        {{$categories->render()}}
                        {{--{!! Field::text('nombre') !!}--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">Aceptar</button>--}}
                                {{--<button type="button" class="btn btn-default">Cancelar</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--{!! Form::close() !!}--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
