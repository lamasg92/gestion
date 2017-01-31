@extends('app')

@section('content')
    <div class="panel-heading">Roles</div>
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
@endsection
