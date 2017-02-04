@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">
@endsection


@section('content')
 <div class="panel-heading">Facturacion</div>
  <div class="panel-body">

    {!! Form::open(['method' => 'POST', 'route' => 'invoices.store']) !!}

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    {!! Field::text('fecha') !!}
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    {!! Field::text('numero') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                    {!! Form::open([ 'class'=>'form']) !!}
                        {!! Field::text('article',  ['class'=>'easy-autocomplete']) !!}
                    {!! Form::close() !!}

                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-4">

                    {!! Form::open([ 'class'=>'form']) !!}
                    {!! Field::text('user',  ['class'=>'easy-autocomplete']) !!}
                    {!! Field::hidden('user_id', null, ['id' => 'user_id']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id Articulo                            </th>
                                <th>Descripcion                            </th>
                                <th>Cantidad                            </th>
                                <th>Precio Unitario                            </th>
                                <th>Total                            </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr class="active">
                            <td>                                1                            </td>
                            <td>                               art                           </td>
                            <td>                               10                          </td>
                            <td>                                5                           </td>
                            <td>                                50                          </td>

                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <span class="label label-default">Importe Total </span>
                                </div>
                                <div class="col-md-4">
                                      <p>
                                        Aca va el importe total de la factura
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="label label-default">Medio de Pago</span>
                </div>
                <div class="col-md-4">
                    <div class="btn-group">

                        <div class="form-group">
                            {!! Form::label('payment_id', 'Medio de pago') !!}
                            {!! Form::select('payment_id', $payments, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'required'])!!}
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <p>
                        cupon de la tarjeta
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">

                    <button type="button" class="btn btn-primary btn-lg">
                        Grabar
                    </button>
                </div>
                <div class="col-md-4">

                    <button type="button" class="btn btn-primary btn-lg">
                        Imprimir
                    </button>
                </div>
                <div class="col-md-4">

                    <button type="button" class="btn btn-warning">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>

    {!! Form::close() !!}

  </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>

    <script>
        $(document).ready(function () {
            var user_options = {
                url: "/invoices/users",
                getValue: "name",

                template: {
                    type: "description",
                    fields: {
                        description: "username"
                    }
                },
                list: {
                    match: {
                        enabled: true
                    },
                    onSelectItemEvent: function() {
                        var user = $("#user").getSelectedItemData();
                        $('#user_id').val(user.id);
                    },
                    onClickEvent: function () {
                        var user = $("#user").getSelectedItemData();
                        window.location.href = '/users/' + user.id;
                    }
                },
                theme: "bootstrap",

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                    }
                },

                preparePostData: function(data) {
                    data.term = $("#user").val();
                    return data;
                },

                requestDelay: 400
            };

            $("#user").easyAutocomplete(user_options);

        });
    </script>
    <script>
        $(document).ready(function () {
            var article_options = {
                url: "/invoices/articles",
                getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "descripcion"
                    }
                },
                list: {
                    match: {
                        enabled: true
                    }
                },

                theme: "bootstrap",

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                    }
                },

                preparePostData: function(data) {
                    data.term = $("#user").val();
                    return data;
                },

                requestDelay: 400
            };

            $("#article").easyAutocomplete(article_options);

        });
    </script>

@endsection
