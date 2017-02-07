@extends('app')

@section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reporte Por cliente</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Comprobante</th>
                                <th>Total</th>
                            </thead>
                                <tbody>
                                 {{--@include('partials.clientsList');--}}
                                </tbody>
                            </table>
                        {{--Allow pagination--}}
                        {{--{{$clients->render()}}--}}
                    </div>

                </div>
                </div>
            </div>
        </div>

@endsection

@endsection