@extends('app')

@section('content')
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register Rol</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            </thead>
                            <tbody>
                              @include('partials.rolesList');
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
