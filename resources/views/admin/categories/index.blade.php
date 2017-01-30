@extends('app')

@section('content')

       <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div id=panel-tittle class="panel-heading">Categorias</div>
                    <div class="panel-body">

                        <a href="{{route('categories.create')}}" class="btn btn-info">
                            <i class="glyphicon glyphicon-new-window"></i>
                            Nueva
                        </a>


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
                    </div>
                </div>
            </div>
        </div>

@endsection
