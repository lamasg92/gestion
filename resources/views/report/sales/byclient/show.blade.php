@extends('app')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reporte del cliente: {{$cliente->nombre }} {{$cliente->apellido }}</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Fecha</th>
                                <th>Comprobante</th>
                                <th>Total</th>
                            </thead>
                                <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>

                                            <td>{{$invoice->created_at }}</td>
                                            <td> {{ str_pad ($invoice->id, 7, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{$invoice->total }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>

                        {{--Allow pagination--}}
                        {{--{{$clients->render()}}--}}
                    </div>

                </div>
                </div>
            </div>
        </div>

@endsection

