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

                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-xs-4">
                                <input id="client" class="form-control typeahead" type="text" placeholder="client" />
                            </div>

                            <div class="col-xs-6">
                                <input class="form-control" type="text" placeholder="Dirección" readonly value="direccion" />
                            </div>
                            <div class="col-xs-2">
                                <input class="form-control" type="text" placeholder="Email" readonly value="email" />
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-xs-7">
                        <input id="article" class="form-control" type="text" placeholder="Nombre del producto" />
                    </div>
                    <div class="col-xs-2">
                        <input id="cantidad" class="form-control" type="text" placeholder="Cantidad" />
                    </div>
                    <div class="col-xs-2">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Precio" value="precio" readonly />
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <button onclick={agregarProducto} class="btn btn-primary form-control" id="btn-agregar">
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width:40px;"></th>
                            <th>Id</th>
                            <th>Producto</th>
                            <th style="width:100px;">Cantidad</th>
                            <th style="width:100px;">Precio Unitario</th>
                            <th style="width:100px;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr each={detail}>
                            <td>
                                <button onclick={deleteDetailRow} class="btn btn-danger btn-xs">X</button>
                            </td>
                            <td>{id}</td>
                            <td>{nombre}</td>
                            <td class="text-right">{cantidad}</td>
                            <td class="text-right">$ {precio}</td>
                            <td class="text-right">$ {total}</td>
                        </tr>
                        </tbody>
                        <tfoot>

                        <tr>
                            <td colspan="4" class="text-right"><b>Total</b></td>
                            <td class="text-right">$ {total}</td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!! Form::label('payment_id', 'Medio de pago') !!}
                        {!! Form::select('payment_id', $payments, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion', 'required'])!!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="btn-group">

                        {!! Field::text('Cupon  ') !!}

                    </div>
                </div>
                <div class="col-md-4">

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

            $("#user").easyAutocomplete({
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
                    }
//                    ,
//                    onSelectItemEvent: function() {
//                        var user = $("#user").getSelectedItemData();
//                        $('#user_id').val(user.id);
//                    },
//                    onClickEvent: function () {
//                        var user = $("#user").getSelectedItemData();
//                        window.location.href = '/users/' + user.id;
//                    }
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
            }).change(function () {
                $('#user_id').val('');

            });

        });
    </script>
    <script>
        $(document).ready(function () {

            $("#article").easyAutocomplete({
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
//                    ,
//                    onSelectItemEvent: function() {
//                        var article = $("#article").getSelectedItemData();
//                        $('#article_id').val(article.id);
//                    },
//                    onClickEvent: function () {
//                        var article = $("#article").getSelectedItemData();
//                        window.location.href = '/users/' + user.id;
//                    }
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
            }).change(function () {
                $('#article_id').val('');
            });
        });
    </script>

@endsection
