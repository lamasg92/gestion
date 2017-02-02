@extends('app')

@section('content')

    <div id=panel-tittle class="panel-heading">Facturas</div>
    <div class="panel-body">

        <a href="{{route('invoice.create')}}" class="btn btn-info">
            <i class="glyphicon glyphicon-new-window"></i>
            Nueva
        </a>

        {!! Form::open(['route' => 'invoice.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
            <div class="form-group">
                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Numero Factura']) !!}
            </div>
              <button type="submit" class="btn btn-default">Buscar</button>
        {!! Form::close() !!}

        <table class="table table-striped">
            <thead>
                <th>Fecha</th>
                <th>Numero</th>
                <th>Cliente</th>
                <th>Total</th>
                <th>Accion</th>
            </thead>
            <tbody>
                 @include('partials.invoiceList');
            </tbody>
        </table>
        {{--Allow pagination--}}
        {{$invoices->render()}}
    </div>


@endsection