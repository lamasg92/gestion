@extends('app')
@section('styles')
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datepicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datepicker/css/bootstrap-datepicker.standalone.css')}}">

@endsection

@section('content')


<body>

            <div class="panel-body">
                <div class="col-md-4 col-md-offset-4">
                    <h1>No Implementado</h1>

                    {{--<form action="/test/save" method="post">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="date">Fecha Desde</label>--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control datepicker" name="datedesde">--}}
                                {{--<div class="input-group-addon">--}}
                                    {{--<span class="glyphicon glyphicon-th"></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<label for="date">Fecha Hasta</label>--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control datepicker" name="datehasta">--}}
                                {{--<div class="input-group-addon">--}}
                                    {{--<span class="glyphicon glyphicon-th"></span>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<button type="submit" class="btn btn-default btn-primary">Enviar</button>--}}
                    {{--</form>--}}
                </div>
            </div>


</body>

@endsection


@section('scripts')
    <script src="{{asset('datepicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

    <script>
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "es",
            autoclose: true
        });
    </script>
@endsection
