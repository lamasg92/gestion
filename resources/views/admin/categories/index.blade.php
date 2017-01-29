@extends('app')

@section('content')

       <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div id=panel-tittle class="panel-heading">Categorias</div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'GET', 'route' => 'categories.create']) !!}

                                <div class="col-md-6 col-md-offset-10">
                                    <button type="submit" class="btn btn-primary">Nueva</button>
                                </div>

                            <table class="table table-striped">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Accion</th>
                                </thead>
                                <tbody>
                                    @include('partials.categoryList');
                                </tbody>
                            </table>
                            {{--Allow pagination--}}
                            {{$categories->render()}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection
