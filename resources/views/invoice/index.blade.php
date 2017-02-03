@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div id=panel-tittle class="panel-heading">Facturas</div>
    <div class="panel-body">

        <a href="{{route('invoice.create')}}" class="btn btn-info">
            <i class="glyphicon glyphicon-new-window"></i>
            Nueva
        </a>

        {!! Form::open([ 'class'=>'form']) !!}
            {!! Field::text('country',  ['class'=>'easy-autocomplete']) !!}
        {!! Form::close() !!}

        {{--{!! Form::open(['route' => 'invoice.index', 'method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Numero Factura']) !!}--}}
            {{--</div>--}}
              {{--<button type="submit" class="btn btn-default">Buscar</button>--}}
        {{--{!! Form::close() !!}--}}

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

@section('scripts')
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>

    <script>
        $(document).ready(function () {
            var options = {

                url: "/resources/country.json",

                getValue: "name",

                list: {
                    match: {
                        enabled: true
                    }
                },

                theme: "bootstrap"
            };

            $("#country").easyAutocomplete(options);

        });
    </script>
@endsection
