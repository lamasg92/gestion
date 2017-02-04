@extends('app')

@section('content')

    <div id=panel-tittle class="panel-heading">Facturas</div>
    <div class="panel-body">

        <a href="{{route('invoices.create')}}" class="btn btn-info">
            <i class="glyphicon glyphicon-new-window"></i>
            Nueva
        </a>

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

