@extends('app')

@section('styles')
    <link href="{{ asset('css/jquery.easy-autocomplete.css') }}" rel="stylesheet">
@endsection


@section('content')
 <div class="panel-heading">Facturacion</div>
  <div class="panel-body">


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label for="fecha">Fecha</label>
                    <input class="form-control" type="text" placeholder="Fecha" readonly name="fecha"  value="{{ Carbon\Carbon::today()->format('d-m-Y ' )}}"/>
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <label for="numeroF">Numero Factura</label>
                    <input class="form-control" type="text" placeholder="Numero" readonly name="numeroF" />
                </div>
            </div>

            <hr />
            <hr />


            <div class="row">

                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-xs-4">
                                <input id="client" class="form-control typeahead" type="text" placeholder="client" />
                            </div>

                            <div class="col-xs-6">
                                <input class="form-control" type="text" placeholder="Dirección" readonly id="direccion" />
                            </div>
                            <div class="col-xs-2">
                                <input class="form-control" type="text" placeholder="Email" readonly id="email" />
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
                            <input class="form-control" type="text" placeholder="Precio" id="precio" readonly />
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <button onclick="agregarProducto()" class="btn btn-primary form-control" id="btn-agregar">
                            <i class="glyphicon glyphicon-plus"></i>
                        </button>
                    </div>
                </div>

            </div>

            <hr />
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width:40px;"></th>
                            <th>Id</th>
                            <th>Producto</th>
                            <th style="width:100px;">Cantidad</th>
                            <th style="width:100px;">P. Unitario</th>
                            <th style="width:100px;">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr each={detail}>
                            <td>
                                <button onclick="deleteDetailRow()" class="btn btn-danger btn-xs">X</button>
                            </td>
                            <td>id</td>
                            <td>@{{ nombre }}</td>
                            <td class="text-right">@{{ cantidad }}</td>
                            <td class="text-right">$ @{{ precio }}</td>
                            <td class="text-right">$ @{{ total }}</td>
                        </tr>
                        </tbody>
                        <tfoot>

                        <tr>
                            <td colspan="4" class="text-right"><b>Total</b></td>
                            <td class="text-right">$ @{{ total }}</td>
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
                  <button  id="grabar" class="btn btn-primary btn-lg">Grabar</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btn-lg">Imprimir</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-warning">Cancelar</button>
                </div>
            </div>
        </div>


  </div>


@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.easy-autocomplete.js') }}"></script>

    <script>

        //self data
        var self = this;
        var client_id = 0;
         var detail = [];
        var total = 0;


        //funtions for detail table
        function agregarProducto()
        {
            detail.push({
                id: article_id,
                nombre: descripcion.value,
                cantidad: parseInt(cantidad.value),
                precio: parseFloat(precio.value),
                total: parseFloat(precio.value * cantidad.value)
            });

            cleanInfo();
            calcularTotales();
        }

        function calcularTotales() {
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
        }

        function cleanInfo() {
            self.article_id = 0;
            self.article.value = '';
            self.cantidad.value = '';
            self.precio = '';


        }

        $('#grabar').click(function() {

//            ['numero', 'fecha', 'client_id', 'user_id', 'payment_id', 'cupon', 'total'];  inoice table fields
//            ['invoice_id', 'cantidad', 'article_id', 'precio', 'total_line'];             Invoice_detail filds
                if (detail.length > 0 && client_id > 0) {

                    $.post(baseUrl('self/store'), {
                        client_id: self.client_id,
                        total: self.total,
                        payment: self.payment_id,
                        cupon: self.cupon,
                        detail: self.detail
                    }, function (r) {
                        if (r.response) {
                            window.location.href = baseUrl('invoice.index');
                        } else {
                            alert('Ocurrio un error');
                        }
                    }, 'json')
                }
                else {

                }
            }
        )
        function deleteDetailRow() {
            alert('borra la fila');
        }

    </script>

        {{--Autocomplete scripst--}}
        <script>

        $(document).ready(function () {

            $("#client").easyAutocomplete({
                url: "/invoices/clients",
                getValue: "nombre",

                template: {
                    type: "description",
                    fields: {
                        description: "direccion"
                    }
                },
                list: {
                    match: {
                        enabled: true
                    }
                    ,
                    onSelectItemEvent: function() {
                        var client = $("#client").getSelectedItemData();
                        $('#client_id').val(client.id);
                        $('#direccion').val(client.direccion);
                        $('#email').val(client.email);
                    },
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
                    data.term = $("#client").val();
                    return data;
                },

                requestDelay: 400
            }).change(function () {
                $('#client_id').val('');

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
                        description: "descripcion",

                    }
                },
                list: {
                    match: {
                        enabled: true
                    }
                    ,
//                    onSelectItemEvent: function() {
//                        var article = $("#article").getSelectedItemData();
//                        $('#article_id').val(article.id);
//                    },
                    onClickEvent: function () {
                        var article = $("#article").getSelectedItemData();

                        $('#precio_unnitario').val(article.precio_unnitario);

                        article_id = article.id;
                        precio = article.precio_unitario;
                        descripcion = article.descripcion;

                        $('#precio').val(article.precio_unitario);
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
            }).change(function () {
                $('#article_id').val('');
            });
        });
    </script>

@endsection
